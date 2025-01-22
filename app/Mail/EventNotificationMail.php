<?php

namespace App\Mail;
use App\Models\Event;
use App\Models\Invitation;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class EventNotificationMail extends Mailable
{
    use Queueable, SerializesModels;

    public $event;
    public $invitation;

    public function __construct(Event $event, Invitation $invitation)
    {
        $this->event = $event;
        $this->invitation = $invitation;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Event Invitation',
            from: 'lasiniprabashi0327@gmail.com'
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'mail.notification'
        );
    }

    public function attachments(): array
    {
        return [];
    }
}
