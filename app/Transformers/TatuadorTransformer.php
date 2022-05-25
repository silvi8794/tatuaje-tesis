<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Models\Tatuador;

class TatuadorTransformer extends TransformerAbstract
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
    public function transform(Tatuador $tatuador)
    {
        return [
            'identificador' => (int)$tatuador->id,
            'documento' => (string)$tatuador->dni,
            'nombre' => (string)$tatuador->nombre,
            'apellido' => (string)$tatuador->apellido,
            'email' => (string)$tatuador->email,
            'especialidad' => (string)$tatuador->especialidad,
            'disponiblidad'=> (string)$tatuador->estado,
            'identificador_sucursal' => (int)$tatuador->sucursal_id,
            'identificador_localidad' => (int)$tatuador->localidad_id,
            'identificador_sexo' => (int)$tatuador->sexo_id,
            'identificador_usuario' => (int)$tatuador->user_id,
            'fecha_creacion' => (string)$tatuador->created_at,
            'fecha_actualizacion' => (string)$tatuador->updated_at,
            'fecha_eliminacion' => isset($tatuador->deleted_at) ? (string)$tatuador->deleted_at : null,

            'links' => [
            [
                'rel' => 'self',
                'href' => route('tatuadores.show', $tatuador->id),
            ],
            [
                'rel' => 'sucursales',
                'href' => route('sucursales.show', $tatuador->sucursal_id),
            ],
            [
                'rel' => 'localidades',
                'href' => route('localidades.show', $tatuador->localidad_id),
            ],
            [
                'rel' => 'sexos',
                'href' => route('sexos.show', $tatuador->sexo_id),
            ],
            [
                'rel' => 'users',
                'href' => route('users.show', $tatuador->user_id),
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
            'especialidad' => 'especialidad',
            'disponiblidad' => 'estado' ,
            'identificador_sucursal' => 'sucursal_id',
            'identificador_localidad' => 'localidad_id',
            'identificador_sexo' => 'sexo_id',
            'identificador_usuario' => 'user_id',
            'fecha_creacion' => 'created_at',
            'fecha_actualizacion' => 'updated_at',
            'fecha_eliminacion' => 'deleted_at',
        ];

        return isset($attributes[$index]) ? $attributes[$index] : null;
    }
}
