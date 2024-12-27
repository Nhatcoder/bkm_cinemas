<?php

namespace App\Mail\Client;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class EmailSubscribeMail extends Mailable
{
    use Queueable, SerializesModels;

    public $email;
    public $user;

    public function __construct($email,$user)
    {
        $this->email = $email;
        $this->user = $user;
    }

    public function build()
    {
        return $this->subject('BKM Cinemas - Rạp chiếu phim 3D công nghệ hàng đầu.')
            ->view('client.mails.email-subscribe')
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
            subject: '[BKM Cinemas] Thông báo đăng kí nhận tin thành công.',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'client.mails.email-subscribe',
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
