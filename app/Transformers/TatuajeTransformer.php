<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Models\Tatuaje;
use App\Models\Sexo;
use App\Models\Categoria;
use App\Models\Lugar;

class TatuajeTransformer extends TransformerAbstract
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
    public function transform(Tatuaje $tatuaje)
    {
        return [
            'identificador' => (int)$tatuaje->id,
            'letra' => (string)$tatuaje->fuente,
            'tamaño' => (string)$tatuaje->tamaño,
            'tatuaje' => (string)$tatuaje->nombre,
            //agregar imagen URL
            'fecha_creacion' => (string)$tatuaje->created_at,
            'fecha_actualizacion' => (string)$tatuaje->updated_at,
            'fecha_eliminacion' => isset($tatuaje->deleted_at) ? (string)$tatuaje->deleted_at : null,

            'links' => [
            [   
                'rel' => 'self',
                'href' => route('tatuajes.show', $tatuaje->id),
            ],
            [
                'rel' => 'sexos',
                'href' => $tatuaje->sexos()->get(),
            ],
            [
                'rel' => 'lugares',
                'href' => $tatuaje->lugares()->get(),
            ],
            [
                'rel' => 'categorias',
                'href' => $tatuaje->categorias()->get(),
            ],
            
            
        ]];
    }

    public static function originalAttribute($index)
    {
        $attributes = [

            'identificador' => 'id',
            'letra' => 'fuente',
            'tamaño' => 'tamaño',
            'tatuaje' => 'nombre',
            'fecha_creacion' => 'created_at',
            'fecha_actualizacion' => 'updated_at',
            'fecha_eliminacion' => 'deleted_at',
        ];

        return isset($attributes[$index]) ? $attributes[$index] : null;
    }
}
