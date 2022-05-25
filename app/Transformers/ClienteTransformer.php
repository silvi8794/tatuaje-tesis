<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Models\Cliente;

class ClienteTransformer extends TransformerAbstract
{
    /**
     * List of resources to automatically include
     *
     * @var array
     */
    protected $defaultIncludes = [
        //
    ];
    
    /**
     * List of resources possible to include
     *
     * @var array
     */
    protected $availableIncludes = [
        //
    ];
    
    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(Cliente $cliente)
    {
        return [
            'identificador' => (int)$cliente->id,
            'documento' => (string)$cliente->dni,
            'nombre' => (string)$cliente->nombre,
            'apellido' => (string)$cliente->apellido,
            'email' => (string)$cliente->email,
            'identificador_localidad' => (int)$cliente->localidad_id,
            'identificador_user' => (int)$cliente->user_id,
            'identificador_sexo' => (int)$cliente->sexo_id,
            'fecha_creacion' => (string)$cliente->created_at,
            'fecha_actualizacion' => (string)$cliente->updated_at,
            'fecha_eliminacion' => isset($cliente->deleted_at) ? (string)$cliente->deleted_at : null,

            'links' => [
            [
                'rel' => 'self',
                'href' => route('clientes.show', $cliente->id),
            ],
            [
                'rel' => 'localidades',
                'href' => route('localidades.show', $cliente->localidad->id),
            ],
            [
                'rel' => 'users',
                'href' => route('users.show', $cliente->user->id),
            ],
            [
                'rel' => 'sexos',
                'href' => route('sexos.show', $cliente->sexo->id),
            ],
            
            
        ]];
    }

     public static function originalAttribute($index)
    {
        $attributes = [

            'identificador' => 'id',
            'documento' => 'dni',
            'nombre' => 'nombre',
            'apellido' => 'apellido',
            'email' => 'email',
            'identificador_localidad' => 'localidad_id',
            'identificador_user' => 'user_id',
            'identificador_sexo' => 'sexo_id',
            'fecha_creacion' => 'created_at',
            'fecha_actualizacion' => 'updated_at',
            'fecha_eliminacion' => 'deleted_at',
        ];

        return isset($attributes[$index]) ? $attributes[$index] : null;
    }
}
