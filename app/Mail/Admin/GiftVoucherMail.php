<?php

namespace App\Mail\Admin;

use App\Models\User;
use App\Models\Voucher;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class GiftVoucherMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public $user;
    public $voucher;
    public function __construct(User $user,Voucher $voucher)
    {
        $this->user = $user;
        $this->voucher = $voucher;
    }

    /**
     * Get the message envelope.
     */
    public function build()
    {
        return $this->subject('BKM Cinemas - Rạp chiếu phim 3D công nghệ hàng đầu.')
            ->view('admin.mails.GiftVoucher')
            ->attach(public_path('client/images/logo.png'), [
                'as' => 'logo.png',
                'mime' => 'image/png',
            ]);
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Bạn vừa nhận được voucher: ' . $this->voucher->name,
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'admin.mails.GiftVoucher',
            with: [
                'user' => $this->user,
                'voucher' => $this->voucher,
            ],
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
