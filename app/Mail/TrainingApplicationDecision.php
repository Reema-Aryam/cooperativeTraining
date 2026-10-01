<?php

namespace App\Mail;

use App\Models\TrainingApplication;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class TrainingApplicationDecision extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(public TrainingApplication $application) {}

    public function envelope(): Envelope
    {
        return new Envelope(subject: __('Training application decision'));
    }

    public function content(): Content
    {
        return new Content(view: 'mail.training-decision');
    }
}
