<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Booking extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'bookings';

    protected $guarded = [];

    public function foodsBooking()
    {
        return $this->hasMany(BookingFood::class);
    }

    public function seatsBooking()
    {
        return $this->hasMany(BookingSeat::class, 'booking_id');
    }

    public function seats()
    {
        return $this->hasManyThrough(
            Seat::class, // Model liên quan (seats)
            BookingSeat::class, // Bảng trung gian (booking_seats)
            'booking_id', // Khóa ngoại trong bảng booking_seats
            'id', // Khóa ngoại trong bảng seats
            'id', // Khóa chính trong bảng bookings
            'seat_id' // Khóa chính trong bảng booking_seats
        );
    }

    public function totalSeatsPrice()
    {
        return $this->seatsBooking->sum(function ($seatBooking) {
            $seat = $seatBooking->seat;
            $basePrice = $seat->room->base_price;
            $bonusPrice = $seat->seatType->bonus_price;
            $slot = $seat->slot;
            return ($basePrice + $bonusPrice) * $slot;
        });
    }

    public function totalFoodsPrice()
    {
        return $this->foodsBooking->sum(function ($foodBooking) {
            return $foodBooking->quantity * $foodBooking->food->price;
        });
    }

    public function totalPrice()
    {
        return $this->totalSeatsPrice() + $this->totalFoodsPrice();
    }

    public function movie()
    {
        return $this->belongsTo(Movie::class, 'movie_id');
    }
    public function showtime()
    {
        return $this->belongsTo(Showtime::class)->withTrashed();
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function cinema()
    {
        return $this->belongsTo(Cinema::class);
    }

    public function getCanCancelAttribute()
    {
        $now = \Carbon\Carbon::now();

        $startTime = \Carbon\Carbon::parse($this->showtime->start_time);

        $timeDifferenceInMinutes = $now->diffInMinutes($startTime, false);

        return $timeDifferenceInMinutes >= 120;
    }

    public function userVoucher()
    {
        return $this->hasMany(UserVoucher::class, 'voucher_id');
    }
}
