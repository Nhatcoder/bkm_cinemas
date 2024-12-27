<?php

namespace App\Listeners\Client;

use App\Mail\Client\ContactMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;

class SendContactEmail implements ShouldQueue
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
    public function handle($user): void
    {
        Mail::to(env('MAIL_FROM_ADDRESS'))->send(new ContactMail($user));
    }
}
