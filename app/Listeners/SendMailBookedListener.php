<?php

namespace App\Listeners;

use App\Events\SendMailBookedEvent;
use App\Mail\Client\BookingMail;
use App\Models\Booking;
use Carbon\Carbon;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendMailBookedListener implements ShouldQueue
{
    /**
     * Create the event listener.
     */
    public function __construct() {}

    /**
     * Handle the event.
     */
    public function handle(SendMailBookedEvent $event): void
    {
        $user = $event->user;
        $code = $event->code;
        $booking = Booking::where('code', $code)
            ->orderBy('created_at', 'desc')
            ->with(['seatsBooking.seat', 'movie', 'foodsBooking.food', 'showtime.room', 'cinema'])
            ->first();
        $showtime = $booking->showtime;
        $room = $showtime->room;
        $foodsBooking = $booking->foodsBooking->map(function ($foodBooking) {
            return collect($foodBooking->food)->merge([
                'quantity' => $foodBooking->quantity
            ]);
        });
        $movie = $booking->movie;
        $cinema = $booking->cinema->load(['area', 'city']);
        $area = $cinema->area;
        $city = $area->city;
        $seatsBooking = $booking->seatsBooking->pluck('seat.seat_number')->toArray();
        $data = [
            'city' => $city,
            'movie_name' => $movie->title,
            'start_time' => $showtime->start_time,
            'amount' => $booking->total_price,
            'room_name' => $room->room_name,
            'code' => $booking->code,
            'seats_number' => implode(',', $seatsBooking),
            'foodsBooking' => $foodsBooking,
            'cinema_name' => $cinema->name,
            'total_food' => $booking->totalFoodsPrice(),
            'total_seat' => $booking->totalSeatsPrice(),
            'total' => $booking->total_price,
        ];
        Mail::to($user->email)->send(new BookingMail($user, $data));
    }
}
