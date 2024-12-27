<?php

namespace App\Mail\Client;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class DepositSuccessMail extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $amount;
    public $time;
    public $payment_method;

    public function __construct($user, $amount, $time, $payment_method)
    {
        $this->user = $user;
        $this->amount = $amount;
        $this->time = $time;
        $this->payment_method = $payment_method;
    }

    public function build()
    {
        return $this->subject('BKM Cinemas - Rạp chiếu phim 3D công nghệ hàng đầu.')
            ->view('client.mails.deposit-succeeded')
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
            subject: '[BKM Cinemas] Thông báo giao dịch thành công.',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'client.mails.deposit-succeeded',
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
