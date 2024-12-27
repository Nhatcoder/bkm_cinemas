<?php

namespace App\Jobs;

use App\Constants\SeatStatus;
use App\Constants\Status;
use App\Events\BookSeat;
use App\Models\Booking;
use Exception;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;

class ResetSeatStatus implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $showtimeId;
    private $userId;
    private $action;

    public function __construct($showtimeId, $userId, $action = 'SEAT_BOOKING')
    {
        $this->showtimeId = $showtimeId;
        $this->userId = $userId;
        $this->action = $action;
    }

    public function handle()
    {
        Log::info($this->action);
        switch ($this->action) {
            case 'SEAT_BOOKING': {
                    if ($this->userId) {
                        $seats = Cache::get("showtime.$this->showtimeId.seats");
                        $seatsNumberSelected = collect($seats)
                            ->where('user_id', '=', $this->userId)
                            ->where('status', '=', SeatStatus::BOOKING)
                            ->pluck('seat_number');
                        BookSeat::dispatch($this->showtimeId, $seatsNumberSelected, [
                            'action' => 'set',
                            'value' => SeatStatus::AVAILABLE
                        ]);
                    }
                    break;
                }
            case 'SEAT_AWAITING_PAYMENT_ACTION': {
                    $latestBooking = Booking::where('user_id', $this->userId)
                        ->where('showtime_id', $this->showtimeId)
                        ->whereNull('status')
                        ->orderBy('created_at', 'desc')
                        ->with('seatsBooking.seat')
                        ->first();
                    Log::info($latestBooking);
                    if ($latestBooking && $latestBooking->seatsBooking) {
                        $seatsNumberSelected = $latestBooking->seatsBooking->pluck('seat.seat_number');
                        BookSeat::dispatch($this->showtimeId, $seatsNumberSelected, [
                            'action' => 'set',
                            'value' => SeatStatus::AVAILABLE
                        ]);
                    }
                    break;
                }
            case 'SEAT_WAITING_PAYMENT': {
                    $latestBooking = Booking::where('user_id', $this->userId)
                        ->where('showtime_id', $this->showtimeId)
                        ->whereNotIn('status', ['completed', 'rejected'])
                        ->orderBy('created_at', 'desc')
                        ->with('seatsBooking.seat')
                        ->first();
                    // Log::info($latestBooking);
                    if ($latestBooking && $latestBooking->seatsBooking) {
                        $seatsNumberSelected = $latestBooking->seatsBooking->pluck('seat.seat_number');
                        Log::info($latestBooking);

                        BookSeat::dispatch($this->showtimeId, $seatsNumberSelected, [
                            'action' => 'set',
                            'value' => SeatStatus::AVAILABLE
                        ]);
                    }
                    break;
                }
        }
    }

    public function uniqueId()
    {
        return $this->showtimeId . '-' . $this->userId;
    }
}
