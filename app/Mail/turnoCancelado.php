<?php

namespace App\Mail;

use App\Models\Cliente;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class turnoCancelado extends Mailable
{
    use Queueable, SerializesModels;

    public $usuarioCliente;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Cliente $usuarioCliente)
    {
        $this->usuarioCliente = $usuarioCliente;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.turnoCancelado');
        /*return $this->subject("Turno cancelado")
        ->markdown('emails.turnoCancelado);*/
    }
}
