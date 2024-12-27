<?php

namespace App\Listeners\Client;

use App\Events\Client\ForgotPasswordRequested;
use App\Mail\Client\ForgotPasswordMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendPasswordResetEmail implements ShouldQueue
{
    use InteractsWithQueue;

    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(ForgotPasswordRequested $event): void
    {
        Mail::to($event->user->email)->send(new ForgotPasswordMail($event->token, $event->user));
    }
}
