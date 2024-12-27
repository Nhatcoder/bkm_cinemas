<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    function paymentSuccess(Request $request)
    {
        $code = $request->code;
        $booking = Booking::where('code', $code)
            ->orderBy('created_at', 'desc')
            ->with(['seatsBooking.seat', 'movie', 'foodsBooking.food', 'showtime', 'cinema'])
            ->first();
        $showtime = $booking->showtime;
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
        return view('client.pages.payment-success', [
            'cinema' => $cinema,
            'booking' => $booking,
            'showtime' => $showtime,
            'seatsBooking' => $seatsBooking,
            'foodsBooking' => $foodsBooking,
            'code' => $code,
            'movie' => $movie,
            'area' => $area,
            'city' => $city,
        ]);
    }

    function paymentFailed(Request $request)
    {
        return view('client.pages.payment-failed');
    }
}
