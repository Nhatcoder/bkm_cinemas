<?php

namespace App\Listeners\Client;

use App\Events\Client\PasswordChanged;
use App\Mail\Client\PasswordChangeNotificationMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendPasswordChangeNotification implements ShouldQueue
{

    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(PasswordChanged $event): void
    {
        Mail::to($event->user->email)->send(new PasswordChangeNotificationMail($event->user, $event->time));
    }
}
