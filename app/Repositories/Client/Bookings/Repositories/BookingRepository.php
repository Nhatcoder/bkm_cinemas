<?php

namespace App\Repositories\Client\Bookings\Repositories;

use App\Models\Booking;
use App\Repositories\Base\BaseRepository;

class BookingRepository extends BaseRepository
{
    public function getModel()
    {
        return Booking::class;
    }

    public function getTicketsByUserId($userId, $date = null)
    {
        $query = $this->model->with([
            'user',
            'cinema.area',
            'cinema.area.city',
            'movie',
            'showtime',
            'showtime.room',
            'seats',
            'seatsBooking.seat',
        ])->where('user_id', $userId)
            ->where('code', '!=', null)
            ->where('status', '!=', null)
            ->where('payment_status', 'completed')
            ->orderBy('id', 'DESC');

        if ($date) {
            $parsedDate = \Carbon\Carbon::createFromFormat('m/Y', $date);

            $query->whereMonth('created_at', $parsedDate->month)
                ->whereYear('created_at', $parsedDate->year);
        }

        return $query->paginate(20);
    }
}
