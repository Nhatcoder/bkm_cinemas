<?php

namespace App\Events\Client;

use Carbon\Carbon;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class DepositSucceeded implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $user;
    public $amount;
    public $time;
    public $payment_method;

    public function __construct($user, $amount, $payment_method)
    {
        $this->user = $user;
        $this->amount = $amount;
        $this->time = Carbon::now()->format('H:i:s d/m/Y');
        $this->payment_method = $payment_method;
    }

    public function broadcastOn(): array
    {
        return [
            new PrivateChannel('channel-name'),
        ];
    }
}
