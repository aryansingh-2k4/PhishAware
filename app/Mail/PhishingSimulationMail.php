<?php

namespace App\Mail;

use App\Models\Campaign;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PhishingSimulationMail extends Mailable
{
    use Queueable, SerializesModels;

    public $campaign;

    public function __construct(Campaign $campaign)
    {
        $this->campaign = $campaign;
    }

    public function build()
    {
        return $this->subject($this->campaign->email_subject)
                    ->view('emails.simulation');
    }
}
