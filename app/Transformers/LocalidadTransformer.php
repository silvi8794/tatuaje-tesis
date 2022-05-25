<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Models\Localidad;

class LocalidadTransformer extends TransformerAbstract
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
    public function transform(Localidad $localidad)
    {
        return [
            'identificador' => (int)$localidad->id,
            'localidad' => (string)$localidad->nombre,
            'identificador_provincia' => (int)$localidad->provincia_id,
            'fecha_creacion' => (string)$localidad->created_at,
            'fecha_actualizacion' => (string)$localidad->updated_at,
            'fecha_eliminacion' => isset($localidad->deleted_at) ? (string)$localidad->deleted_at : null,

             'links' => [
                 'rel' => 'self',
                 'href' => route('localidades.show', $localidad->id),
             ],
             [
                'rel' => 'provincias',
                'href' => route('provincias.show', $localidad->provincia_id),
             ],
        ];
        
    }

    public static function originalAttribute($index)
    {
        $attributes = [

            'identificador' => 'id',
            'localidad' => 'nombre',
            'identificador_provincia' => 'provincia_id',
            'fecha_creacion' => 'created_at',
            'fecha_actualizacion' => 'updated_at',
            'fecha_eliminacion' => 'deleted_at',
        ];

        return isset($attributes[$index]) ? $attributes[$index] : null;
    }
}
