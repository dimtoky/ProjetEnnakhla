<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class registerMail extends Mailable
{
    use Queueable, SerializesModels;


protected $var;
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
                    ->subject('Votre Compte Ennakhla Upload')
                    ->view('mail.registermail')
                    ->with([
                        'nom' => $this->var['name'],
                        'email' => $this->var['email'],
                        'password' => $this->var['password'],
                    ]);;
    }
}
