<?php

namespace App\Transformers;

use App\Models\TipoUser;
use League\Fractal\TransformerAbstract;

class TipoUserTransformer extends TransformerAbstract
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
    public function transform(TipoUser $tipoUser)
    {
        return [
            'identificador' => (int)$tipoUser->id,
            'tipo' => (string)$tipoUser->nombre,
            'fecha_creacion' => (string)$tipoUser->created_at,
            'fecha_actualizacion' => (string)$tipoUser->updated_at,
            'fecha_eliminacion' => isset($tipoUser->deleted_at) ? (string)$tipoUser->deleted_at : null,

            'links' => [
                'rel' => 'self',
                'href' => route('tipoUser.show', $tipoUser->id),
            ],
        ];
    }

    public static function originalAttribute($index)
    {
        $attributes = [

            'identificador' => 'id',
            'tipo' => 'nombre',
            'fecha_creacion' => 'created_at',
            'fecha_actualizacion' => 'updated_at',
            'fecha_eliminacion' => 'deleted_at',
        ];

        return isset($attributes[$index]) ? $attributes[$index] : null;
    }
}