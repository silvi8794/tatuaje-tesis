<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Models\Categoria;

class CategoriaTransformer extends TransformerAbstract
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
    public function transform(Categoria $categoria)
    {
        return [
            'identificador' => (int)$categoria->id,
            'categoria' => (string)$categoria->nombre,
            'fecha_creacion' =>(string)$categoria->created_at,
            'fecha_actualizacion' =>(string)$categoria->updated_at,
            'fecha_eliminacion' => isset($categoria->deleted_at) ? (string)$categoria->deleted_at : null,

            'links' => [
                'rel' => 'self',
                'href' => route('categorias.show', $categoria->id),
            ],
            
        ];
    }

      public static function originalAttribute($index)
    {
        $attributes = [

            'identificador' => 'id',
            'categoria' => 'nombre',
            'fecha_creacion' =>'created_at',
            'fecha_actualizacion' =>'updated_at',
            'fecha_eliminacion' => 'deleted_at',
        ];

        return isset($attributes[$index]) ? $attributes[$index] : null;
    }
}
