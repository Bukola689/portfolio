<?php

namespace App\Listeners;

use App\Events\Contact;
use App\Mail\SendContactMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class ContactMail
{
    protected $contact;
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct(Contact $contact)
    {
        $this->contact = $contact;
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        Mail::to($event->contact)->send(new SendContactMail($event->contact));
    }
}
