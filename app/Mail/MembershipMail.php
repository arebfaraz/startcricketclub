<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class MembershipMail extends Mailable
{
    use Queueable, SerializesModels;

    public $data;

    /**
     * Create a new message instance.
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Membership Mail',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.membership',  // Update this to your email template
            with: ['data' => $this->data],
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, Attachment>
     */
    public function attachments(): array
    {
        $attachments = [];

        // Attach photo if exists
        if (isset($this->data['photo'])) {
            $attachments[] = Attachment::fromPath(storage_path('app/public/player_images/' . $this->data['photo']))
                ->as($this->data['name'])
                ->withMime('image/jpeg'); // or the appropriate MIME type
        }

        // Attach payment screenshot if exists
        if (isset($this->data['payment_screenshot'])) {
            $attachments[] = Attachment::fromPath(storage_path('app/public/payments/' . $this->data['payment_screenshot']))
                ->as('payment_screenshot')
                ->withMime('image/jpeg'); // or the appropriate MIME type
        }

        return $attachments;
    }
}
