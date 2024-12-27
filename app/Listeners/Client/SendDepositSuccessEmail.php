<?php

namespace App\Listeners\Client;

use App\Events\Client\DepositSucceeded;
use App\Mail\Client\DepositSuccessMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendDepositSuccessEmail implements ShouldQueue
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(DepositSucceeded $event)
    {
        Mail::to($event->user->email)->send(new DepositSuccessMail($event->user, $event->amount, $event->time, $event->payment_method));
    }
}
