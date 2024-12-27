<?php

namespace App\Events;

use App\Constants\SeatStatus;
use App\Jobs\ResetSeatStatus;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Queue;

class BookSeat implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $seats;
    public $showtimeId;
    private $seatsNumber;
    private $seatsStorage;
    public function __construct($showtimeId, $seatsNumber, $option = [
        'action' => 'toggle',
        'value' => SeatStatus::AVAILABLE,
    ])
    {
        $this->seatsNumber = $seatsNumber;
        $this->showtimeId = $showtimeId;
        $this->seatsStorage = Cache::get("showtime.$this->showtimeId.seats");

        switch ($option['action']) {
            case 'toggle': {
                    $this->toggle();
                    break;
                }
            case 'set': {
                    $this->set($option['value']);
                    break;
                }
        }
        Cache::put("showtime.$this->showtimeId.seats", $this->seatsStorage);
    }

    public function toggle()
    {
        $userId = optional(auth()->user())->id;
        foreach ($this->seatsNumber as $index => $seatNumber) {
            $this->seats[$index] = $this->seatsStorage[$seatNumber];
            if ($this->seats[$index]->status == SeatStatus::AVAILABLE) {
                $currentOrder = collect($this->seatsStorage)->where('user_id', $userId)->max('selected_order') ?? 0;
                $this->seats[$index]->selected_order = $currentOrder + 1;
                $this->seats[$index]->status = SeatStatus::BOOKING;
                $this->seats[$index]->user_id = $userId;
            } else if ($this->seats[$index]->status == SeatStatus::BOOKING) {
                $this->seats[$index]->status = SeatStatus::AVAILABLE;
                $this->seats[$index]->user_id = null;
            }
            $this->seatsStorage[$seatNumber] = $this->seats[$index];
        }
    }

    public function set($seatStatus)
    {
        $userId = optional(auth()->user())->id;
        foreach ($this->seatsNumber as $index => $seatNumber) {
            $this->seats[$index] = $this->seatsStorage[$seatNumber];
            if ($seatStatus == SeatStatus::BOOKING) {
                $currentOrder = collect($this->seatsStorage)->where('user_id', $userId)->max('selected_order') ?? 0;
                $this->seats[$index]->selected_order = $currentOrder + 1;
                $this->seats[$index]->status = SeatStatus::BOOKING;
                $this->seats[$index]->user_id = $userId;
            } else if ($seatStatus == SeatStatus::AVAILABLE) {
                $this->seats[$index]->status = SeatStatus::AVAILABLE;
                $this->seats[$index]->user_id = null;
            } else if ($seatStatus == SeatStatus::BOOKED) {
                $this->seats[$index]->status = SeatStatus::BOOKED;
                $this->seats[$index]->user_id = $userId;
            }
            $this->seatsStorage[$seatNumber] = $this->seats[$index];
        }
    }

    public function broadcastOn(): array
    {
        return [
            new PresenceChannel("showtime.$this->showtimeId"),
        ];
    }
}
