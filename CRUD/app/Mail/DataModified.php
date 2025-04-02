<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class DataModified extends Mailable
{
    use Queueable, SerializesModels;

    public $modifiedData, $previousData;

    public function __construct($modifiedData, $previousData)
    {
        $this->modifiedData = $modifiedData;
        $this->previousData = $previousData;
    }
    public function build()
    {
        return $this->from(config('mail.from.address'))
                ->subject('Duomenys pakeisti')->text('emails.modified_data');
    }
    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Duomenys atnaujinti',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.modified_data',
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
