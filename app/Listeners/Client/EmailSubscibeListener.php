<?php

namespace App\Listeners\Client;

use App\Events\Client\EmailSubscribeEvent;
use App\Mail\Client\EmailSubscribeMail;
use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class EmailSubscibeListener implements ShouldQueue
{
    public function __construct()
    {
        //
    }
    public function handle(EmailSubscribeEvent $event): void
    {
        $email = $event->email;
        $user = User::where('email', $email)->first();
        $mail = new EmailSubscribeMail($email,$user);
        Mail::to($email)->send($mail);
    }
}
