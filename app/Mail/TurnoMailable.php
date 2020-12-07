<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class TurnoMailable extends Mailable
{
    use Queueable, SerializesModels;

    public $subject = "Turno Confirmado";
    public $turno;
    public $fechaTurno;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($turno,$fechaTurno)
    {
        $this->turno = $turno;
        $this->fechaTurno = $fechaTurno;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('email.turnoConfirmado');
    }
}
