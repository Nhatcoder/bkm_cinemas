<?php

namespace App\Mail\Client;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ForgotPasswordMail extends Mailable
{
    use Queueable, SerializesModels;

    public $token;

    public $user;

    public function __construct($token, User $user)
    {
        $this->token = $token;
        $this->user = $user;
    }

    public function build()
    {
        return $this->subject('Khôi phục mật khẩu tại BKM Cinemas')
            ->view('client.mails.forgot-password-email')
            ->with([
                'token' => $this->token,
                'email' => $this->user->email,
            ])
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
            subject: '[BKM Cinemas] Yêu cầu thay đổi mật khẩu ' . $this->user->first_name . ' ' . $this->user->last_name . '!',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'client.mails.forgot-password-email',
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
