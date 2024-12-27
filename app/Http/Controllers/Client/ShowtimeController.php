<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Jobs\ResetSeatStatus;
use App\Models\Showtime;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ShowtimeController extends Controller
{
    protected $showtime;

    public function detail(Showtime $showtime)
    {
        $userId = optional(auth()->user())->id;

        if (($showtime->start_time < Carbon::now()->subHours(2))) {
            return view('error.client.404');
        }

        DB::table('jobs')
            ->where('payload', 'LIKE', '%' . $showtime->id . '%')
            ->where('payload', 'LIKE', '%' . $userId . '%')
            ->delete();
        $endTime = now()->addSeconds(300);
        ResetSeatStatus::dispatch($showtime->id, $userId);
        ResetSeatStatus::dispatch($showtime->id, $userId)->delay($endTime);
        ResetSeatStatus::dispatch($showtime->id, $userId, 'SEAT_AWAITING_PAYMENT_ACTION');
        ResetSeatStatus::dispatch($showtime->id, $userId, 'SEAT_WAITING_PAYMENT');

        return view('client.pages.buy-ticket', [
            'showtimeId' => $showtime->id,
            'endTime' => $endTime->toIso8601String()
        ]);
    }
}
