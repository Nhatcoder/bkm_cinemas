<?php

namespace App\Http\Controllers\Api;

use App\Constants\MemberLevel;
use App\Constants\SeatStatus;
use App\Events\BookSeat;
use App\Events\OrderRefundStatusUpdated;
use App\Events\OrderStatusUpdated;
use App\Events\OrderStatusUpdatedClient;
use App\Http\Controllers\Controller;
use App\Jobs\ResetSeatStatus;
use App\Models\Booking;
use App\Models\Notification;
use App\Models\Transaction;
use App\Models\UserVoucher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Services\Admin\Orders\Interfaces\OrderServiceInterface;

class BookingController extends Controller
{
    private $orderService;
    public function __construct(
        OrderServiceInterface $orderService
    ) {
        $this->orderService = $orderService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'seats' => 'required|array|min:1',
            'foods' => 'nullable',
            'movie_id' => 'required|integer',
            'showtime_id' => 'required|integer',
            'payment_id' => 'required|integer',
            'cinema_id' => 'required|integer'
        ]);

        $seats = collect($request->seats)->map(function ($seat) {
            return [
                'seat_id' => $seat['id'],
            ];
        });

        $foods = collect($request->foods)->map(function ($food) {
            return [
                'food_id' => $food['id'],
                'quantity' => $food['quantity'],
            ];
        });
        DB::beginTransaction();
        try {
            $booking = new Booking();
            $booking->cinema_id = $request->cinema_id;
            $booking->user_id = auth()->id();
            $booking->movie_id = $request->movie_id;
            $booking->showtime_id = $request->showtime_id;
            $booking->save();
            $booking->seatsBooking()->createMany($seats);
            $booking->foodsBooking()->createMany($foods);
            $booking->total_price = $booking->totalPrice();
            $booking->save();
            DB::commit();
            BookSeat::dispatch($booking->showtime_id, collect($request->seats)->pluck('seat_number'), [
                'action' => 'set',
                'value' => SeatStatus::BOOKED
            ]);
            DB::table('jobs')
                ->where('payload', 'LIKE', '%' . $booking->showtime_id . '%')
                ->where('payload', 'LIKE', '%' . $booking->user_id . '%')
                ->delete();
            $endTime = now()->addSeconds(180);
            ResetSeatStatus::dispatch($request->showtime_id, auth()->id(), 'SEAT_AWAITING_PAYMENT_ACTION')->delay($endTime);
            $booking->endTime = $endTime->toIso8601String();
            return response()->json($booking, 201);
        } catch (\Exception $error) {
            DB::rollBack();
            BookSeat::dispatch($request->showtime_id, collect($request->seats)->pluck('seat_number'), [
                'action' => 'set',
                'value' => SeatStatus::AVAILABLE
            ]);
            return response()->json(['message' => $error->getMessage()], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function changeStatus(Request $request, $id)
    {
        try {
            $validated = $request->validate([
                'status' => ['required', 'in:cancelled,waiting_for_cancellation,rejected'],
            ]);

            $record = $this->orderService->find($id);
            if (empty($record)) {
                return response()->json(['failed' => 'Có lỗi xảy ra!', 'id' => $id], 404);
            }

            if ($validated['status'] == 'waiting_for_cancellation') {
                if (!$record->getCanCancelAttribute()) {
                    return response()->json(['failed' => 'Không thể hủy!', 'id' => $id], 400);
                } elseif (
                    !($record->status == 'completed'
                        && $record->payment_status == 'completed'
                        && $record->get_tickets == 0
                        && $record->user_id == auth()->user()->id)
                ) {
                    return response()->json(['failed' => 'Không đủ điều kiện hủy!', 'id' => $id], 400);
                }
                Notification::create([
                    'user_id' => $record->user_id,
                    'cinema_id' => $record->cinema_id,
                    'title'   => 'Người dùng ' . ($record->user->name ?? $record->user->email) . ' yêu cầu hủy vé: ' . $record->code,
                    'type'    => 'refund',
                ]);
            }else{
                Notification::where('type', 'refund')->where('user_id', $record->user_id)->delete();
            }

            if ($validated['status'] == 'cancelled') {
                $record->refund_status = 'pending';
                UserVoucher::where('voucher_id', $record->voucher_id)->update([
                    'deleted_at' => null
                ]);
                ResetSeatStatus::dispatch($record->showtime_id, auth()->id(), 'SEAT_WAITING_PAYMENT');
            }

            $record->status = $validated['status'];
            $record->save();

            broadcast(new OrderStatusUpdated([
                'id' => $id,
                'refund' => false,
                'status' => $record->status,
                'cinema_id' => $record->cinema_id,
                'code' => $record->code,
                'userName' => $record->user->name ?? $record->user->email,
                'urlChangeRefundStatus' => route('api.orders.changeRefundStatus', $record->id),
                'urlChangeStatus' => route('api.orders.changeStatus', $record->id),
                'urlGetTicket' => route('admin.orders.changeGetTickets', $record->id),
            ]));

            broadcast(new OrderStatusUpdatedClient([
                'id' => $id,
                'status' => $record->status,
                'cinema_id' => $record->cinema_id,
                'user_id' => $record->user_id,
                'code' => $record->code,
                'userName' => $record->user->name ?? $record->user->email,
                'urlChangeRefundStatus' => route('api.orders.changeRefundStatus', $record->id),
                'urlChangeStatus' => route('api.orders.changeStatus', $record->id),
                'urlGetTicket' => route('admin.orders.changeGetTickets', $record->id),
            ]));

            return response()->json(['success' => 'Thành công!', 'id' => $id], 200);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'failed' => 'Dữ liệu không hợp lệ!',
                'errors' => $e->errors(),
            ], 422);
        } catch (\Exception $e) {
            return response()->json([
                'failed' => 'Đã xảy ra lỗi không xác định!',
                'message' => $e->getMessage(),
            ], 500);
        }
    }

    public function changeRefundStatus(Request $request, $id)
    {
        try {
            $validated = $request->validate([
                'status' => ['required', 'in:completed'],
            ]);

            $record = $this->orderService->find($id);
            if (empty($record)) {
                return response()->json(['failed' => 'Có lỗi xảy ra!', 'id' => $id], 404);
            }
            if (
                !($record->status == 'cancelled'
                && $record->payment_status == 'completed'
                && $record->refund_status == 'pending'
                && $record->get_tickets == 0)
            ) {
                return response()->json(['failed' => 'Không đủ điều kiện hoàn tiền !', 'id' => $id], 400);
            }
            $user = $record->user;

            if ($user) {
                $user->balance += $record->final_price;
                $user->save();
            }

            $record->refund_status = $validated['status'];
            $record->save();

            Transaction::create([
                'user_id' => $record->user_id,
                'payment_method' => 'customer',
                'amount'   => $record->final_price,
                'type'    => 'refund',
                'description'    => 'Hoàn tiền thành công!',
                'status'    => 'completed',
                'balance_after'    => $user->balance,
            ]);

            broadcast(new OrderStatusUpdated([
                'id' => $id,
                'refund' => true,
                'cinema_id' => $record->cinema_id,
            ]));

            broadcast(new OrderRefundStatusUpdated([
                'id' => $id,
                'status' => $record->status,
                'code' => $record->code,
                'total_price' => $record->total_price,
            ], $record->user));

            return response()->json(['success' => 'Thành công!', 'id' => $id], 200);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'failed' => 'Dữ liệu không hợp lệ!',
                'errors' => $e->errors(),
            ], 422);
        } catch (\Exception $e) {
            return response()->json([
                'failed' => 'Đã xảy ra lỗi không xác định!',
                'message' => $e->getMessage(),
            ], 500);
        }
    }
}
