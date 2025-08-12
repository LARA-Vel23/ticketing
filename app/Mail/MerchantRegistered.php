<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class MerchantRegistered extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $password;

    public function __construct($user, $password)
    {
        $this->user = $user;
        $this->password = $password;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Merchant Registered Successfully',
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'mail.MerchantRegistered',
            with: [
                'user' => $this->user,
                'password' => $this->password
            ],
        );
    }

    public function build()
    {
        return $this->markdown('mail.MerchantRegistered');
    }
}
