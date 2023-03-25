<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class AcceptanceMail extends Mailable
{
    use Queueable, SerializesModels;

    public $name;

    public $password;

    public $email;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name,$password,$email)
    {
        $this->name=$name;
        $this->password=$password;
        $this->email=$email;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('waromaschool@gmail.com', 'Waroma School')
        ->markdown('emails.Acceptance')
        ->subject('You have been accepted!');
    }
}
