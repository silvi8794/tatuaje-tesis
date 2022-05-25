<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Models\Sexo;

class SexoTransformer extends TransformerAbstract
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
    public function transform(Sexo $sexo)
    {
        return [
            'identificador' => (int)$sexo->id,
            'sexo' => (string)$sexo->nombre,
            'fecha_creacion' => (string)$sexo->created_at,
            'fecha_actualizacion' => (string)$sexo->updated_at,
            'fecha_eliminacion' => isset($sexo->deleted_at) ? (string)$sexo->deleted_at : null,

            'links' => [
                'rel' => 'self',
                'href' => route('sexos.show', $sexo->id),
            ],
        ];
    }

    public static function originalAttribute($index)
    {
        $attributes = [

            'identificador' => 'id',
            'sexo' => 'nombre',
            'fecha_creacion' => 'created_at',
            'fecha_actualizacion' => 'updated_at',
            'fecha_eliminacion' => 'deleted_at',
        ];

        return isset($attributes[$index]) ? $attributes[$index] : null;
    }
}
