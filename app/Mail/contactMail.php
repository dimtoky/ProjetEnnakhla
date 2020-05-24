<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class contactMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Array $var)
    {
        $this->var = $var;
     
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('saidryadh@gmail.com')
                    ->subject('Message de '.$this->var['name'].'')
                    ->view('mail.contactmail')
                    ->with([
                        'nom' => $this->var['name'],
                        'email' => $this->var['email'],
                        'phone' => $this->var['mobile'],
                        'subject' => $this->var['subject'],
                        'Umessage' => $this->var['message'],
                    ]);;
    }
}
