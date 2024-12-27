<?php

namespace App\Listeners\Admin;

use App\Mail\Admin\OrderRefundMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendMailOrderRefund implements ShouldQueue
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
    public function handle(object $event): void
    {
        Mail::to($event->user->email)->send(new OrderRefundMail($event->order, $event->user, $event->time));
    }
}
