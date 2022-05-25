<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Models\Provincia;

class ProvinciaTransformer extends TransformerAbstract
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
    public function transform(Provincia $provincia)
    {
        return [
            'identificador' => (int)$provincia->id,
            'provincia' => (string)$provincia->nombre,
            'fecha_creacion' => (string)$provincia->created_at,
            'fecha_actualizacion' => (string)$provincia->updated_at,
            'fecha_eliminacion' => isset($provincia->deleted_at) ? (string)$provincia->deleted_at : null,

            'links' => [
                'rel' => 'self',
                'href' => route('provincias.show', $provincia->id),
            ],
        ];
        
    }

    public static function originalAttribute($index)
    {
        $attributes = [

            'identificador' =>'id',
            'provincia' => 'nombre',
            'fecha_creacion' => 'created_at',
            'fecha_actualizacion' => 'updated_at',
            'fecha_eliminacion' => 'deleted_at',
        ];

        return isset($attributes[$index]) ? $attributes[$index] : null;
    }
}
