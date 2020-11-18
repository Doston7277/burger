<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $subject;
    public $message;
    public $name;
 
    public function __construct($subject, $message, $name)
    {
        $this->subject = $subject;
        $this->message = $message;
        $this->name = $name;
    }

    public function build()
    {
        $e_subject = $this->subject;
        $e_message = $this->message;
        $e_name = $this->name;
        return $this->view('frontend.contact', compact("e_message"))->subject("$e_subject");
    }
}