<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Auth;

class WelcomeEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $user= Auth::user();

        return $this->view('mail.welcomemail')
        ->from('trellolike@bocal.com', 'Trellolike project')
        ->subject('Hello & Welcome!')
        ->replyto('trellolike@bocal.com', 'Trellolike project');
    }
}
