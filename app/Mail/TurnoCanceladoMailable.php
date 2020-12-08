<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class TurnoCanceladoMailable extends Mailable
{
    use Queueable, SerializesModels;
    public $subject = "Turno Cancelado";
    public $turno;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($turno)
    {
        $this->turno = $turno;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('email.turnoCancelado');
    }
}
