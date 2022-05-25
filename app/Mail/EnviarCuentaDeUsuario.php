<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
//use App\User;
use App\Models\User;

class EnviarCuentaDeUsuario extends Mailable
{
    use Queueable, SerializesModels;

    public $usuario, $usuarioTatuador, $url;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $usuario, $usuarioTatuador)
    {
        $this->usuario = $usuario;
        $this->usuarioTatuador = $usuarioTatuador;
        $this->url= '/login/'.$this->usuario->email.'/'.$usuario->verification_token;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.bienvenido_usuario')
            ->from('no-reply@tatuajetesis.com')
            ->subject('¡¡ Bienvenido !!');
    }
}
