<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Room;

class Seat extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    protected $casts = [
        'merged_seats' => 'array',
    ];

    public function room()
    {
        return $this->belongsTo(Room::class);
    }

    public function seatType()
    {
        return $this->belongsTo(SeatType::class, 'type', 'code');
    }

    public function bookingSeats()
    {
        return $this->hasMany(BookingSeat::class);
    }

    public function bookings()
    {
        return $this->hasManyThrough(
            Booking::class,
            BookingSeat::class,
            'seat_id',
            'id',
            'id',
            'booking_id'
        );
    }
}
