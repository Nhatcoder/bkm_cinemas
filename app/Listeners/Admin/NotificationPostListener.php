<?php

namespace App\Listeners\Admin;

use App\Events\Admin\GiftVoucherEvent;

use App\Mail\Admin\GiftVoucherMail;
use App\Mail\Admin\NotificationPostMail;
use App\Models\Post;
use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class NotificationPostListener implements ShouldQueue
{
    public function __construct()
    {
        //
    }
    public function handle($event): void
    {
        $idPosts = $event->id;
        $post = Post::find($idPosts);
        // Lấy danh sách người dùng từ database
        $users = User::where('type','member')->where('status',1)->get();

        foreach ($users as $user) {
            // Gửi mail cho từng người dùng
            $mail = new NotificationPostMail($user,$post);
            Mail::to($user->email)->send($mail);
        }
    }
}
