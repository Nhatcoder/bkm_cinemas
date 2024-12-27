<?php

namespace App\Repositories\Admin\Orders\Repositories;

use App\Constants\MemberLevel;
use App\Models\Booking;
use App\Repositories\Base\BaseRepository;
use App\Repositories\Admin\Orders\Interfaces\OrderInterface;
use Carbon\Carbon;

class OrderRepository extends BaseRepository implements OrderInterface
{
    public function getModel()
    {
        return Booking::class;
    }

    public function getAll()
    {
        return $this->model
            ->whereNotNull('code') 
            ->whereNotNull('status')
            ->when(auth()->user()->cinema_id, function ($query, $cinemaId) {
                $query->where('cinema_id', $cinemaId);
            })
            ->with([
                'user:id,name,email',
                'cinema:id,name',
                'movie:id,title',
                'showtime:id,start_time,room_id',
                'showtime.room:id,room_name',
            ])
            ->whereHas('cinema.area.city') 
            ->orderBy('id', 'desc')
            ->get();
    }


    public function filter($request)
    {
        $data = $this->model->newQuery();
        $data = $data->where('code', '!=', null)
            ->where('status', '!=', null)
            ->when(auth()->user()->cinema_id, function ($query, $cinemaId) {
                $query->where('cinema_id', $cinemaId);
            })
            ->with([
                'user:id,name,email',
                'cinema:id,name',
                'movie:id,title,image',
                'showtime:id,start_time,room_id',
                'showtime.room:id,room_name',
            ]);
        $data = $this->filterByCode($data, $request);
        $data = $this->filterByStatus($data, $request);
        $data = $this->filterByPaymentStatus($data, $request);
        $data = $this->filterByRefundStatus($data, $request);
        $data = $this->filterByGetTickets($data, $request);
        $data = $data->orderBy('id', 'desc')->paginate(self::PAGINATION);
        return $data->appends([
            'code' => $request->code,
            'status' => $request->status,
            'payment_status' => $request->payment_status,
            'refund_status' => $request->refund_status,
            'get_tickets' => $request->get_tickets,
        ]);
    }

    public function changeGetTickets($id)
    {
        $order = $this->model->find($id);
        if (
            ($order->status == 'completed'|| $order->status == 'rejected')
            && $order->payment_status == 'completed'
            && is_null($order->refund_status)
            && $order->get_tickets == 0
        ) {
            $user = $order->user;
            $memberLevel = $user->membership_level;
            $rateMap = [
                MemberLevel::MEMBER => 0.00005,
                MemberLevel::VIP    => 0.00007,
                MemberLevel::VVIP   => 0.00010,
            ];

            if (isset($rateMap[$memberLevel])) {
                $point = $user->points;
                $calculatedPoints = $order->total_price * $rateMap[$memberLevel];
                $calculatedPoints = ($calculatedPoints - floor($calculatedPoints) >= 0.5) ? ceil($calculatedPoints) : floor($calculatedPoints);

                if ($calculatedPoints > 0) {
                    $point += $calculatedPoints;
                    $user->update([
                        'points' => $point,
                    ]);
                }
            }

            $order->get_tickets = 1;
            $order->save();

            return $order;
        }
        return false;
    }

    public function changeManyTickets()
    {
        if (now()->lessThan(Carbon::today()->setHour(22))) {
            return "not_time_yet";
        }
        
        $orders = $this->model
            ->whereHas('showtime', function ($query) {
                $query->where('start_time', '<', now());
            })
            ->where('cinema_id', auth()->user()->cinema_id)
            ->where('get_tickets', '!=', 1)
            ->whereIn('status', ['completed', 'rejected'])
            ->where('payment_status', 'completed')
            ->whereNull('refund_status')
            ->with('user')
            ->get();

        if ($orders->isEmpty()) {
            return false;
        }

        $this->model
            ->whereIn('id', $orders->pluck('id'))
            ->update(['get_tickets' => 1]);

        foreach ($orders as $order) {
            $user = $order->user;

            if ($user) {
                $memberLevel = $user->membership_level;
                $rateMap = [
                    MemberLevel::MEMBER => 0.00005,
                    MemberLevel::VIP    => 0.00007,
                    MemberLevel::VVIP   => 0.00010,
                ];

                if (isset($rateMap[$memberLevel])) {
                    $point = $user->points;
                    $calculatedPoints = $order->total_price * $rateMap[$memberLevel];
                    $calculatedPoints = ($calculatedPoints - floor($calculatedPoints) >= 0.5) ? ceil($calculatedPoints) : floor($calculatedPoints);

                    if ($calculatedPoints > 0) {
                        $point += $calculatedPoints;
                        $user->update([
                            'points' => $point,
                        ]);
                    }
                }
            }
        }
        return true;
    }

    private function filterByCode($query, $request)
    {
        if (!empty($request->code)) {
            return $query->where('code', 'like', '%' . $request->code . '%');
        }
        return $query;
    }

    private function filterByStatus($query, $request)
    {
        if (!empty($request->status)) {
            return $query->where('status', $request->status);
        }
        return $query;
    }

    private function filterByPaymentStatus($query, $request)
    {
        if (!empty($request->payment_status)) {
            return $query->where('payment_status', $request->payment_status);
        }
        return $query;
    }

    private function filterByRefundStatus($query, $request)
    {
        if (!empty($request->refund_status)) {
            return $query->where('refund_status', $request->refund_status);
        }
        return $query;
    }

    private function filterByGetTickets($query, $request)
    {
        if (!empty($request->get_tickets)) {
            return $query->where('get_tickets', $request->get_tickets);
        }
        return $query;
    }
}
