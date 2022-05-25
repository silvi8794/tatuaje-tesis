<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class msjContacto extends Mailable
{
    use Queueable, SerializesModels;

    public $motivo = 'Mensaje Recibido';
    public $mensaje;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($mensaje)
    {

        $this->mensaje = $mensaje;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        //return $this->view('emails.msjContacto');
        return $this->subject("Consulta")
        ->markdown('emails.msjContacto', $this->mensaje);
    }
}
