<?php

namespace App\Mail;

use App\Models\User;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class EnviarCuentaDeCliente extends Mailable
{
    use Queueable, SerializesModels;

    public $usuario, $usuarioCliente, $url, $password;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $usuario, $usuarioCliente, $password)
    {
        $this->usuario = $usuario;
        $this->usuarioCliente = $usuarioCliente;
        $this->url= '/login/'.$this->usuario->email.'/'.$usuario->verification_token;
        $this->password = $password;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.bienvenido_cliente')
            ->from('silviiperezz@outlook.com')
            ->subject('¡¡ Bienvenido !!');
    }
}
