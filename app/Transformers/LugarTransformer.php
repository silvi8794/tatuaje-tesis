<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Models\Lugar;

class LugarTransformer extends TransformerAbstract
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
    public function transform(Lugar $lugar)
    {
        return [
            'identificador' => (int)$lugar->id,
            'ubicacion' => (string)$lugar->nombre,
            'fecha_creacion' => (string)$lugar->created_at,
            'fecha_actualizacion' => (string)$lugar->updated_at,
            'fecha_eliminacion' => isset($lugar->deleted_at) ? (string)$lugar->deleted_at : null,

            'links' => [
                'rel' => 'self',
                'href' => route('lugares.show', $lugar->id),
            ],
        ];
    }

    public static function originalAttribute($index)
    {
        $attributes = [

            'identificador' =>'id',
            'ubicacion' => 'nombre',
            'fecha_creacion' =>'created_at',
            'fecha_actualizacion' =>'updated_at',
            'fecha_eliminacion' =>'deleted_at',
        ];

        return isset($attributes[$index]) ? $attributes[$index] : null;
    }
}
