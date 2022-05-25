<?php

namespace App\Mail;

use App\Models\User;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class EnviarCuentaDeAdministrador extends Mailable
{
    use Queueable, SerializesModels;

    public $usuario, $usuarioAdministrador, $url;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $usuario, $usuarioAdministrador)
    {
        $this->usuario = $usuario;
        $this->usuarioAdministrador = $usuarioAdministrador;
        $this->url= '/login/'.$this->usuario->email.'/'.$usuario->verification_token;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.bienvenido_administrador')
            ->from('no-reply@tatuajetesis.com')
            ->subject('¡¡ Bienvenido !!');
    }
}
