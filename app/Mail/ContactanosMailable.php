<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactanosMailable extends Mailable
{
    use Queueable, SerializesModels;

    public $nombre_persona;
    public $vehiculo;
    public $esEstimado;

    public $subject = "Service MechanicSheep";

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($nombre_persona, $vehiculo, $esEstimado)
    {
        $this->nombre_persona = $nombre_persona;
        $this->vehiculo = $vehiculo;
        $this->esEstimado = $esEstimado;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('email.contactUs');
    }
}
