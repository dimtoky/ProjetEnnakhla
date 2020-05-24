<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class FValidation extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($client, $filename)
    {
         $this->client = $client;
          $this->filename =$filename;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
         return $this->from('saidryadh@gmail.com')
                    ->subject('Notification de validation')
                    ->view('mail.validationmail')
                    ->with([
                        'file' => $this->filename,
                        'client' => $this->client,
                       
                    ]);;
    }
}
