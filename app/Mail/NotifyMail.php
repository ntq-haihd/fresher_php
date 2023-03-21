<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use App\Http\Controllers\UsersController;

class NotifyMail extends Mailable
{
    use Queueable, SerializesModels;

    public $password;


    public function __construct($password)
    {
        $this->password = $password;
    }


    public function envelope()
    {
        return new Envelope(
            subject: 'Reset Password',
        );
    }


    public function content()
    {
        return new Content(
            view: 'email',
            with: ['password' => $this->password]
        );
    }


    public function attachments()
    {
        return [];
    }
}
