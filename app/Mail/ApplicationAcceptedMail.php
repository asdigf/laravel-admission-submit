<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ApplicationAcceptedMail extends Mailable
{
    use Queueable, SerializesModels;

    public $application;

    public function __construct($application)
    {
        $this->application = $application;
    }

    public function build()
    {
        return $this->subject('Your Application Has Been Accepted')
                    ->view('emails.application_accepted')
                    ->with([
                        'student_name' => $this->application->applicant_name,
                        'programme' => $this->application->programme,
                        'intake' => $this->application->intake,
                    ]);
    }
}
