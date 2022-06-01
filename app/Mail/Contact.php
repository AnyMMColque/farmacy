<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Contact extends Mailable
{
    use Queueable, SerializesModels;

    public $name;
    public $mail;
    public $message;

    public function __construct($name, $mail, $message)
    {
        $this->name = $name;
        $this->mail = $mail;
        $this->message = $message;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mails.contact')->with([
            'name' => $this->name,
            'mail' => $this->mail,
            'messag' => $this->message,
        ]);
    }
}
