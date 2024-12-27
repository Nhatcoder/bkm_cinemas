<?php

namespace App\Listeners\Client;

use App\Events\Client\UserRegistered;
use App\Mail\Client\RegisterMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendRegisterEmail implements ShouldQueue
{
    use InteractsWithQueue;
    public function __construct()
    {
        //
    }

    public function handle(UserRegistered $event)
    {
        Mail::to($event->user->email)->send(new RegisterMail($event->user));
    }
}
