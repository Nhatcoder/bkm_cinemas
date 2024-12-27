<?php

namespace App\Http\Controllers\Api;

use App\Constants\MemberLevel;
use App\Constants\SeatStatus;
use App\Constants\Status;
use App\Events\BookSeat;
use App\Events\Client\DepositSucceeded;
use App\Events\SendMailBookedEvent;
use App\Http\Controllers\Controller;
use App\Jobs\ResetSeatStatus;
use App\Mail\Client\BookingMail;
use App\Models\Booking;
use App\Models\Voucher;
use App\Models\VoucherUser;
use App\Services\Client\Deposits\Interfaces\DepositServiceInterface;
use App\Services\Client\Transactions\Interfaces\TransactionServiceInterface;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class PaymentController extends Controller
{
    protected $depositService;

    protected $transactionService;

    public function __construct(
        DepositServiceInterface     $depositService,
        TransactionServiceInterface $transactionService
    ) {
        $this->depositService = $depositService;

        $this->transactionService = $transactionService;
    }

    public function generateRandomOrderCode($length = 8)
    {
        return substr(str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789'), 0, $length);
    }

    public function processDeposit(Request $request)
    {
        $orderCode = $this->generateRandomOrderCode(8);
        if ($request->booking_id) {
            $booking = Booking::find($request->booking_id);
            DB::table('jobs')
                ->where('payload', 'LIKE', '%' . $booking->showtime_id . '%')
                ->where('payload', 'LIKE', '%' . $booking->user_id . '%')
                ->delete();
            $second = $request->payment == 'zalopay' ? 900 : ($request->payment == 'momo' ? 600 : 300);
            ResetSeatStatus::dispatch($booking->showtime_id, auth()->id(), 'SEAT_WAITING_PAYMENT')->delay(now()->addSeconds($second));
            $amount = $booking->totalPrice();
            $discountPrice = $this->calculatorVoucherPrice($amount, $request->voucher_id);
            $finalPrice = $amount - $discountPrice;
            $booking->update([
                'code' => $orderCode,
                'payment_status' => Status::PENDING,
                'discount_price' => $discountPrice,
                'final_price' => $finalPrice,
                'voucher_id' => $request->voucher_id,
                'payment_method' => $request->payment
            ]);
            if ($request->payment == 'customer' || $finalPrice == 0) {
                $customerResponse = $this->customer_payment($finalPrice, $booking);
                return response()->json($customerResponse);
            } else if ($request->payment == 'vnpay') {
                $vnpayUrl = $this->vnpay_payment($orderCode, $finalPrice);
                return response()->json($vnpayUrl);
            } elseif ($request->payment == 'momo') {
                $momoUrl = $this->momo_payment($orderCode, $finalPrice);
                return response()->json($momoUrl);
            } elseif ($request->payment == 'zalopay') {
                $zaloPayUrl = $this->zaloPay_payment($orderCode, $finalPrice);
                return response()->json($zaloPayUrl);
            }
        }
    }


    // Vnpay
    public function vnpay_payment($orderCode, $amount)
    {
        $vnp_TmnCode = config('payment.vnpay.vnp_TmnCode');
        $vnp_HashSecret = config('payment.vnpay.vnp_HashSecret');
        $vnp_Url = config('payment.vnpay.vnp_Url');
        $vnp_Returnurl = route('api.payments.vnpayReturn');

        $vnp_TxnRef = $orderCode;
        $vnp_OrderInfo = "Đặt ghế - BKM Cinemas";
        $vnp_OrderType = "billpayment";
        $vnp_Amount = $amount * 100;
        $vnp_Locale = "vn";
        $vnp_IpAddr = request()->ip();
        $vnp_ExpireDate = Carbon::now()->addMinutes(5)->format('YmdHis');

        $inputData = [
            "vnp_Version" => "2.1.0",
            "vnp_TmnCode" => $vnp_TmnCode,
            "vnp_Amount" => $vnp_Amount,
            "vnp_Command" => "pay",
            "vnp_CreateDate" => date('YmdHis'),
            "vnp_CurrCode" => "VND",
            "vnp_IpAddr" => $vnp_IpAddr,
            "vnp_Locale" => $vnp_Locale,
            "vnp_OrderInfo" => $vnp_OrderInfo,
            "vnp_OrderType" => $vnp_OrderType,
            "vnp_ReturnUrl" => $vnp_Returnurl,
            "vnp_TxnRef" => $vnp_TxnRef,
            "vnp_ExpireDate" => $vnp_ExpireDate
        ];

        ksort($inputData);
        $query = "";
        $hashdata = "";
        $i = 0;

        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
            } else {
                $hashdata .= urlencode($key) . "=" . urlencode($value);
                $i = 1;
            }
            $query .= urlencode($key) . "=" . urlencode($value) . '&';
        }

        $vnp_Url = $vnp_Url . "?" . $query;

        if (isset($vnp_HashSecret)) {
            $vnpSecureHash = hash_hmac('sha512', $hashdata, $vnp_HashSecret);
            $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
        }

        return [
            'code' => '00',
            'message' => 'success',
            'payment_url' => $vnp_Url
        ];
    }

    public function vnpayReturn(Request $request)
    {
        $vnp_HashSecret = config('payment.vnpay.vnp_HashSecret');
        $inputData = $request->all();
        $vnp_SecureHash = $inputData['vnp_SecureHash'];
        $orderCode = $inputData['vnp_TxnRef'];
        unset($inputData['vnp_SecureHash']);

        ksort($inputData);
        $hashData = "";
        foreach ($inputData as $key => $value) {
            $hashData .= urlencode($key) . "=" . urlencode($value) . '&';
        }
        $hashData = rtrim($hashData, '&');
        $secureHash = hash_hmac('sha512', $hashData, $vnp_HashSecret);

        if ($secureHash === $vnp_SecureHash) {
            $vnp_ResponseCode = $request->get('vnp_ResponseCode');
            $booking = Booking::where('code', $orderCode)->first();
            if ($booking == null) {
                Log::warning('Booking not found: ' . $orderCode);
            }

            $amount = $inputData['vnp_Amount'] / 100;

            $expIncrement = 0;

            $membershipLevel = Auth::user()->membership_level;

            $baseExpPer1000 = 2;
            $membershipLevel = Auth::user()->membership_level;

            switch ($membershipLevel) {
                case 'member':
                    $expIncrement = round(floor($amount / 1000) * $baseExpPer1000);
                    break;
                case 'vip':
                    $expIncrement = round(floor($amount / 1000) * ($baseExpPer1000 * 0.75));
                    break;
                case 'vvip':
                    $expIncrement = round(floor($amount / 1000) * ($baseExpPer1000 * 0.5));
                    break;
                default:
                    $expIncrement = 0;
            }

            $newExp = Auth::user()->exp + $expIncrement;

            if ($newExp >= 8000000) {
                if(Auth::user()->membership_level === 'vip' && $newExp == 8000000) {
                    $voucher = Voucher::where('level_type', 'vvip')->where('active', 1)->first();
                    if ($voucher) {
                        VoucherUser::create([
                            'user_id' => Auth::user()->id,
                            'voucher_id' => $voucher->id
                        ]);
                    }
                }
                $membershipLevel = 'vvip';
            } elseif ($newExp >= 4000000) {
                if(Auth::user()->membership_level === 'member' && $newExp == 4000000) {
                    $voucher = Voucher::where('level_type', 'vip')->where('active', 1)->first();
                    if ($voucher) {
                        VoucherUser::create([
                            'user_id' => Auth::user()->id,
                            'voucher_id' => $voucher->id
                        ]);
                    }
                }
                $membershipLevel = 'vip';
            } elseif ($newExp >= 2000000) {
                $membershipLevel = 'member';
            }

            // Cập nhật dữ liệu thành viên
            $data = [
                'vnp_Amount' => $amount,
                'exp' => $newExp,
                'membership_level' => $membershipLevel ?? Auth::user()->membership_level,
                'is_new_member' => $data['is_new_member'] ?? Auth::user()->is_new_member,
            ];

            // Cập nhật thông tin vào database
            $this->depositService->updatePayment($data, Auth::user()->id);

            $dataTransaction = [
                'user_id' => $booking->user_id,
                'payment_method' => 'vnpay',
                'amount' => $inputData['vnp_Amount'] / 100,
                'type' => 'booking',
                'description' => 'Giao dịch thành công - Đặt vé',
                'balance_after' => Auth::user()->balance,
                'status' => Status::COMPLETED
            ];
            DB::beginTransaction();
            try {
                if ($vnp_ResponseCode != '00') {
                    $dataTransaction['status'] = Status::CANCELED;
                    $dataTransaction['description'] = 'Giao dịch bị hủy - Đặt vé';
                    BookSeat::dispatch($booking->showtime_id, $booking->seatsBooking->pluck('seat.seat_number'), [
                        'action' => 'set',
                        'value' => SeatStatus::AVAILABLE
                    ]);
                } else {
                    // $this->updatePoints($booking->total_price);
                    auth()->user()->vouchers()->updateExistingPivot($booking->voucher_id, ['deleted_at' => now()]);
                }
                $this->transactionService->create($dataTransaction);
                DB::commit();
            } catch (\Exception $e) {
                DB::rollBack();
                $dataTransaction['status'] = Status::FAILED;
                $dataTransaction['description'] = 'Lỗi giao dịch - Đặt vé';
                Log::error('Transaction failed: ' . $e->getMessage());
                $this->transactionService->create($dataTransaction);
                BookSeat::dispatch($booking->showtime_id, $booking->seatsBooking->pluck('seat.seat_number'), [
                    'action' => 'set',
                    'value' => SeatStatus::AVAILABLE
                ]);
            }
            if ($dataTransaction['status'] == Status::COMPLETED) {
                $booking->update([
                    'payment_status' => Status::COMPLETED,
                    'status' => Status::COMPLETED
                ]);
                return redirect()->route('thanh-cong', [
                    'code' => $booking->code
                ]);
            } else {
                $booking->forceDelete();
                return redirect()->route('that-bai');
            }
        }
    }

    // Momo
    public function momo_payment($orderCode, $amount)
    {
        $amount = (string) $amount;
        $momoConfig = config('payment.momo');
        $partnerCode = $momoConfig['momo_PartnerCode'];
        $accessKey = $momoConfig['momo_AccessKey'];
        $secretKey = $momoConfig['momo_SecretKey'];
        $endpoint = $momoConfig['momo_Url'];
        $notifyUrl = $momoConfig['momo_notify_url'];
        $returnUrl = route('api.payments.momoReturn');

        $orderInfo = "Đặt ghế - BKM Cinemas";
        $requestId = time() . "";
        $requestType = "payWithMoMoATM";
        $extraData = "";

        $rawHash = "partnerCode={$partnerCode}&accessKey={$accessKey}&requestId={$requestId}&bankCode=SML&amount={$amount}&orderId={$orderCode}&orderInfo={$orderInfo}&returnUrl={$returnUrl}&notifyUrl={$notifyUrl}&extraData={$extraData}&requestType={$requestType}";
        $signature = hash_hmac("sha256", $rawHash, $secretKey);

        $data = [
            'partnerCode' => $partnerCode,
            'accessKey' => $accessKey,
            'requestId' => $requestId,
            'amount' => $amount,
            'orderId' => $orderCode,
            'orderInfo' => $orderInfo,
            'bankCode' => 'SML',
            'returnUrl' => $returnUrl,
            'notifyUrl' => $notifyUrl,
            'extraData' => $extraData,
            'requestType' => $requestType,
            'signature' => $signature,
        ];

        $response = Http::timeout(5)->post($endpoint, $data);
        $jsonResult = $response->json();

        return [
            'payment_url' => $jsonResult['payUrl'] ?? null,
            'error' => $jsonResult['errorCode'] ?? null,
            'message' => $jsonResult['localMessage'] ?? 'Có lỗi xảy ra',
        ];
    }

    public function momoReturn(Request $request)
    {
        $orderCode = $request->orderId;
        $rawHash = "partnerCode={$request->partnerCode}&accessKey={$request->accessKey}&requestId={$request->requestId}&amount={$request->amount}&orderId={$request->orderId}&orderInfo={$request->orderInfo}&orderType={$request->orderType}&transId={$request->transId}&message={$request->message}&localMessage={$request->localMessage}&responseTime={$request->responseTime}&errorCode={$request->errorCode}&payType={$request->payType}&extraData={$request->extraData}";

        $partnerSignature = hash_hmac("sha256", $rawHash, config('payment.momo.momo_SecretKey'));
        if ($partnerSignature == $request->signature) {
            $booking = Booking::where('code', '=', $orderCode)->first();
            if ($booking == null) {
                Log::warning('Booking not found: ' . $orderCode);
            }

            $amount = $request->amount;

            $expIncrement = 0;

            $membershipLevel = Auth::user()->membership_level;

            $baseExpPer1000 = 2;
            $membershipLevel = Auth::user()->membership_level;

            switch ($membershipLevel) {
                case 'member':
                    $expIncrement = round(floor($amount / 1000) * $baseExpPer1000);
                    break;
                case 'vip':
                    $expIncrement = round(floor($amount / 1000) * ($baseExpPer1000 * 0.75));
                    break;
                case 'vvip':
                    $expIncrement = round(floor($amount / 1000) * ($baseExpPer1000 * 0.5));
                    break;
                default:
                    $expIncrement = 0;
            }

            $newExp = Auth::user()->exp + $expIncrement;

            if ($newExp >= 8000000) {
                if(Auth::user()->membership_level === 'vip' && $newExp == 8000000) {
                    $voucher = Voucher::where('level_type', 'vvip')->where('active', 1)->first();
                    if ($voucher) {
                        VoucherUser::create([
                            'user_id' => Auth::user()->id,
                            'voucher_id' => $voucher->id
                        ]);
                    }
                }
                $membershipLevel = 'vvip';
            } elseif ($newExp >= 4000000) {
                if(Auth::user()->membership_level === 'member' && $newExp == 4000000) {
                    $voucher = Voucher::where('level_type', 'vip')->where('active', 1)->first();
                    if ($voucher) {
                        VoucherUser::create([
                            'user_id' => Auth::user()->id,
                            'voucher_id' => $voucher->id
                        ]);
                    }
                }
                $membershipLevel = 'vip';
            } elseif ($newExp >= 2000000) {
                $membershipLevel = 'member';
            }

            // Cập nhật dữ liệu thành viên
            $data = [
                'vnp_Amount' => $amount,
                'exp' => $newExp,
                'membership_level' => $membershipLevel ?? Auth::user()->membership_level,
                'is_new_member' => $data['is_new_member'] ?? Auth::user()->is_new_member,
            ];

            // Cập nhật thông tin vào database
            $this->depositService->updatePayment($data, Auth::user()->id);

            $dataTransaction = [
                'user_id' => $booking->user_id,
                'payment_method' => 'momo',
                'amount' => $request->amount,
                'type' => 'booking',
                'description' => 'Giao dịch thành công - Đặt vé',
                'balance_after' => Auth::user()->balance,
                'status' => Status::COMPLETED
            ];
            DB::beginTransaction();
            try {
                if ($request->errorCode != '0') {
                    $dataTransaction['status'] = Status::CANCELED;
                    $dataTransaction['description'] = 'Giao dịch bị hủy - Đặt vé';
                    BookSeat::dispatch($booking->showtime_id, $booking->seatsBooking->pluck('seat.seat_number'), [
                        'action' => 'set',
                        'value' => SeatStatus::AVAILABLE
                    ]);
                } else {
                    $this->updatePoints($booking->total_price);
                    auth()->user()->vouchers()->updateExistingPivot($booking->voucher_id, ['deleted_at' => now()]);
                }
                $this->transactionService->create($dataTransaction);
                DB::commit();
            } catch (\Exception $e) {
                DB::rollBack();
                $dataTransaction['status'] = Status::FAILED;
                $dataTransaction['description'] = 'Lỗi giao dịch - Đặt vé';
                Log::error('Transaction failed: ' . $e->getMessage());
                $this->transactionService->create($dataTransaction);
                BookSeat::dispatch($booking->showtime_id, $booking->seatsBooking->pluck('seat.seat_number'), [
                    'action' => 'set',
                    'value' => SeatStatus::AVAILABLE
                ]);
            }
            if ($dataTransaction['status'] == Status::COMPLETED) {
                $booking->update([
                    'payment_status' => Status::COMPLETED,
                    'status' => Status::COMPLETED
                ]);
                return redirect()->route('thanh-cong', [
                    'code' => $booking->code
                ]);
            } else {
                $booking->forceDelete();
                return redirect()->route('that-bai');
            }
        }
    }

    public function zaloPay_payment($orderCode, $amountTotal)
    {
        $config = config('payment.zalopay');
        $amount = $amountTotal;
        $app_time = round(microtime(true) * 1000);
        $app_trans_id = date(format: "ymd") . "_" . $orderCode;
        $app_user = 'demo';
        $bank_code = '';
        $description = "Nạp tiền vào ví thành viên - BKM Cinemas";
        $embed_data = json_encode(['redirecturl' => route('api.payments.zaloPayReturn')]);
        $item = json_encode([["itemid" => "knb", "itemname" => "kim nguyen bao", "itemprice" => 198400, "itemquantity" => 1]]);

        $data = [
            'app_id' => $config['zalopay_AppId'],
            'app_time' => $app_time,
            'app_trans_id' => $app_trans_id,
            'app_user' => $app_user,
            'bank_code' => $bank_code,
            'description' => $description,
            'embed_data' => $embed_data,
            'item' => $item,
            'amount' => $amount,
        ];

        $dataValue = $data['app_id'] . '|' .
            $data['app_trans_id'] . '|' .
            $data['app_user'] . '|' .
            $data['amount'] . '|' .
            $data['app_time'] . '|' .
            $data['embed_data'] . '|' .
            $data['item'];

        $data['mac'] = hash_hmac('sha256', $dataValue, $config['zalopay_Key1']);

        $context = stream_context_create([
            'http' => [
                'header' => "Content-Type: application/x-www-form-urlencoded\r\n",
                'method' => 'POST',
                'content' => http_build_query($data),
            ]
        ]);

        $resp = file_get_contents($config['zalopay_Endpoint'], false, $context);
        $result = json_decode($resp, true);

        return [
            'return_code' => $result['return_code'],
            'payment_url' => $result['order_url'],
        ];
    }

    public function zaloPayReturn(Request $request)
    {
        $return_code = $request->input('return_code');
        $app_trans_id = $request->input('apptransid');
        $amount = $request->input('amount');
        $order_info = $request->input('order_info');
        $orderCode = explode('_', $app_trans_id)[1];

        $booking = Booking::where('code', $orderCode)->first();
        if ($booking == null) {
            Log::warning('Booking not found: ' . $orderCode);
        }

        $amount = $request->amount;

        $expIncrement = 0;

        $membershipLevel = Auth::user()->membership_level;

        $baseExpPer1000 = 2;
        $membershipLevel = Auth::user()->membership_level;

        switch ($membershipLevel) {
            case 'member':
                $expIncrement = round(floor($amount / 1000) * $baseExpPer1000);
                break;
            case 'vip':
                $expIncrement = round(floor($amount / 1000) * ($baseExpPer1000 * 0.75));
                break;
            case 'vvip':
                $expIncrement = round(floor($amount / 1000) * ($baseExpPer1000 * 0.5));
                break;
            default:
                $expIncrement = 0;
        }

        $newExp = Auth::user()->exp + $expIncrement;

        if ($newExp >= 8000000) {
            if(Auth::user()->membership_level === 'vip' && $newExp == 8000000) {
                $voucher = Voucher::where('level_type', 'vvip')->where('active', 1)->first();
                if ($voucher) {
                    VoucherUser::create([
                        'user_id' => Auth::user()->id,
                        'voucher_id' => $voucher->id
                    ]);
                }
            }
            $membershipLevel = 'vvip';
        } elseif ($newExp >= 4000000) {
            if(Auth::user()->membership_level === 'member' && $newExp == 4000000) {
                $voucher = Voucher::where('level_type', 'vip')->where('active', 1)->first();
                if ($voucher) {
                    VoucherUser::create([
                        'user_id' => Auth::user()->id,
                        'voucher_id' => $voucher->id
                    ]);
                }
            }
            $membershipLevel = 'vip';
        } elseif ($newExp >= 2000000) {
            $membershipLevel = 'member';
        }

        // Cập nhật dữ liệu thành viên
        $data = [
            'vnp_Amount' => $amount,
            'exp' => $newExp,
            'membership_level' => $membershipLevel ?? Auth::user()->membership_level,
            'is_new_member' => $data['is_new_member'] ?? Auth::user()->is_new_member,
        ];

        // Cập nhật thông tin vào database
        $this->depositService->updatePayment($data, Auth::user()->id);

        $dataTransaction = [
            'user_id' => $booking->user_id,
            'payment_method' => 'zalopay',
            'amount' => $request->amount,
            'type' => 'booking',
            'description' => 'Giao dịch thành công - Đặt vé',
            'balance_after' => Auth::user()->balance,
            'status' => Status::COMPLETED
        ];
        DB::beginTransaction();
        try {
            if ($request->status != 1) {
                $dataTransaction['status'] = Status::CANCELED;
                $dataTransaction['description'] = 'Giao dịch bị hủy - Đặt vé';
                BookSeat::dispatch($booking->showtime_id, $booking->seatsBooking->pluck('seat.seat_number'), [
                    'action' => 'set',
                    'value' => SeatStatus::AVAILABLE
                ]);
            } else {
                auth()->user()->vouchers()->updateExistingPivot($booking->voucher_id, ['deleted_at' => now()]);
            }
            $this->transactionService->create($dataTransaction);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            $dataTransaction['status'] = Status::FAILED;
            $dataTransaction['description'] = 'Lỗi giao dịch - Đặt vé';
            Log::error('Transaction failed: ' . $e->getMessage());
            $this->transactionService->create($dataTransaction);
            BookSeat::dispatch($booking->showtime_id, $booking->seatsBooking->pluck('seat.seat_number'), [
                'action' => 'set',
                'value' => SeatStatus::AVAILABLE
            ]);
        }
        $booking->update([
            'payment_status' => $dataTransaction['status'],
            'status' => $dataTransaction['status']
        ]);
        if ($dataTransaction['status'] == Status::COMPLETED) {
            $booking->update([
                'payment_status' => Status::COMPLETED,
                'status' => Status::COMPLETED
            ]);
            return redirect()->route('thanh-cong', [
                'code' => $booking->code
            ]);
        } else {
            $booking->forceDelete();
            return redirect()->route('that-bai');
        }
    }

    public function customer_payment($amount, Booking $booking)
    {
        $userPoints = auth()->user()->balance;
        $balance_after = $userPoints - $amount;
        $dataTransaction = [
            'user_id' => $booking->user_id,
            'payment_method' => 'customer',
            'amount' => $amount,
            'type' => 'booking',
            'description' => 'Giao dịch thành công - Đặt vé',
            'balance_after' => $balance_after,
            'status' => Status::COMPLETED
        ];
        DB::beginTransaction();
        try {
            if ($balance_after < 0) {
                $dataTransaction['status'] = Status::LOW;
                $dataTransaction['description'] = 'Số dư không đủ để đặt vé';
                $dataTransaction['balance_after'] = $userPoints;
                BookSeat::dispatch($booking->showtime_id, $booking->seatsBooking->pluck('seat.seat_number'), [
                    'action' => 'set',
                    'value' => SeatStatus::AVAILABLE
                ]);
                return $dataTransaction;
            } else {
                auth()->user()->update(['balance' => $balance_after]);
                // $this->updatePoints($booking->total_price);
                auth()->user()->vouchers()->updateExistingPivot($booking->voucher_id, ['deleted_at' => now()]);
            }
            $this->transactionService->create($dataTransaction);
            $dataTransaction['code'] = $booking->code;
            if ($dataTransaction['status'] == Status::COMPLETED) {
                SendMailBookedEvent::dispatch(auth()->user(), $booking->code);
            }
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            $dataTransaction['status'] = Status::FAILED;
            $dataTransaction['description'] = 'Lỗi giao dịch - Đặt vé';
            Log::error('Transaction failed: ' . $e->getMessage());
            $this->transactionService->create($dataTransaction);
            BookSeat::dispatch($booking->showtime_id, $booking->seatsBooking->pluck('seat.seat_number'), [
                'action' => 'set',
                'value' => SeatStatus::AVAILABLE
            ]);
        }
        if ($dataTransaction['status'] == Status::COMPLETED) {
            $booking->update([
                'payment_status' => Status::COMPLETED,
                'status' => Status::COMPLETED
            ]);
        } else {
            $booking->forceDelete();
        }
        return $dataTransaction;
    }

    public function updatePoints($totalPrice)
    {
        $user = auth()->user(); // Lấy người dùng hiện tại
        if ($user) {
            $memberLevel = $user->membership_level;
            $rateMap = [
                MemberLevel::MEMBER => 0.00005,
                MemberLevel::VIP    => 0.00007,
                MemberLevel::VVIP   => 0.00010,
            ];

            // Kiểm tra nếu membership_level có trong $rateMap
            if (isset($rateMap[$memberLevel])) {
                $point = $user->points;
                // Tính toán điểm dựa trên giá trị totalPrice và tỷ lệ
                $point += round($totalPrice * $rateMap[$memberLevel]);

                // Cập nhật điểm thưởng
                $user->update([
                    'points' => $point,
                ]);
            }
        }
    }

    private function calculatorVoucherPrice($amount, $voucherId)
    {
        $voucher = Voucher::find($voucherId);
        $discountPrice = 0;
        if ($voucher) {
            if ($voucher->discount_type == 'money') {
                $discountPrice = $voucher->discount_value;
            }
            if ($voucher->discount_type == 'percentage') {
                $discountPrice = ($amount * $voucher->discount_value) / 100;
            }
        }
        if ($discountPrice >= $amount) $discountPrice = $amount;

        return $discountPrice;
    }
}
