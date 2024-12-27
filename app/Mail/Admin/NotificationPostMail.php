<?php

namespace App\Mail\Admin;

use App\Models\Post;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class NotificationPostMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public $user;
    public $post;
    public function __construct(User $user,Post $post)
    {
        $this->user = $user;
        $this->post = $post;
    }

    /**
     * Get the message envelope.
     */
    public function build()
    {
        return $this->subject('BKM Cinemas - Rạp chiếu phim 3D công nghệ hàng đầu.')
            ->view('admin.mails.NotificationPost')
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
            subject: 'Thông báo khuyến mãi: ' . $this->post->name,
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'admin.mails.NotificationPost',
            with: [
                'user' => $this->user,
                'post' => $this->post,
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
