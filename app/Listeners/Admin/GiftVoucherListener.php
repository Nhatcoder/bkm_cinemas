<?php

namespace App\Listeners\Admin;

use App\Events\Admin\GiftVoucherEvent;
use App\Events\Client\DepositSucceeded;
use App\Mail\Client\DepositSuccessMail;
use App\Mail\Admin\GiftVoucherMail;
use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class GiftVoucherListener implements ShouldQueue
{
    public function __construct()
    {
        //
    }
    public function handle(GiftVoucherEvent $event): void
    {
        $userIds = $event->userIds;
        $voucher = $event->voucher;

        // Lấy danh sách người dùng từ database
        $users = User::whereIn('id', $userIds)->get();

        foreach ($users as $user) {
            // Gửi mail cho từng người dùng
            $mail = new GiftVoucherMail($user,$voucher);
            Mail::to($user->email)->send($mail);
        }
    }
}
