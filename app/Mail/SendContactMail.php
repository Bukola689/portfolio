<?php

namespace App\Mail;

use App\Events\Contact;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendContactMail extends Mailable
{
    use Queueable, SerializesModels;

   // protected $contact;

   public $name;

   public $email;

   public $message;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct( $name, $email, $message)
    {
        $this->name = $name;

        $this->email = $email;

        $this->message = $message;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
                   ->subject('Mail From Portfolio')
                   ->replyTo($this->email)
                   ->markdown('mails.contact');
    }
}
