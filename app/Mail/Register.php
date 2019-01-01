<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\URL;

class Register extends Mailable
{
    use Queueable, SerializesModels;

    private $role;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(string $role)
    {
        $this->role = $role;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        $url = URL::temporarySignedRoute(
            'register', now()->addDay(), ['role' => $this->role]
        );

        return $this->markdown('mail.register')->with([
            'url' => $url
        ]);
    }
}
