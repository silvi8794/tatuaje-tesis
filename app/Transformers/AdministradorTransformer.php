<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Models\Administrador;

class AdministradorTransformer extends TransformerAbstract
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
    public function transform(Administrador $administrador)
    {
        return [
            'identificador' => (int)$administrador>id,
            'documento' => (string)$administrador->dni,
            'nombre' => (string)$administrador->nombre,
            'apellido' => (string)$administrador->apellido,
            'email' => (string)$administrador->email,
            'disponiblidad'=> (string)$administrador->estado,
            'identificador_localidad' => (int)$administrador->localidad_id,
            'identificador_user' => (int)$administrador->user_id,
            'identificador_sexo' => (int)$administrador->sexo_id,
            'fecha_creacion' => (string)$administrador->created_at,
            'fecha_actualizacion' => (string)$administrador->updated_at,
            'fecha_eliminacion' => isset($administrador->deleted_at) ? (string)$administrador->deleted_at : null,

            'links' => [
            [
                'rel' => 'self',
                'href' => route('administradors.show', $administrador->id),
            ],
            [
                'rel' => 'localidades',
                'href' => route('localidades.show', $administrador->localidad->id),
            ],
            [
                'rel' => 'users',
                'href' => route('users.show', $administrador->user->id),
            ],
            [
                'rel' => 'sexos',
                'href' => route('sexos.show', $administrador->sexo->id),
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
