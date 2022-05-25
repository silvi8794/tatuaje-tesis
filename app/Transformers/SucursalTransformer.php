<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Models\Sucursal;

class SucursalTransformer extends TransformerAbstract
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
    public function transform(Sucursal $sucursal)
    {
        return [
            'identificador' => (int)$sucursal->id,
            'sucursal' => (string)$sucursal->nombre,
            'ubicacion' => (string)$sucursal->direccion,
            'desde' => (string)$sucursal->horario_inicio,
            'hasta' => (string)$sucursal->horario_fin,
            'identificador_localidad' => (int)$sucursal->localidad_id,
            'fecha_creacion' => (string)$sucursal->created_at,
            'fecha_actualizacion' => (string)$sucursal->updated_at,
            'fecha_eliminacion' => isset($sucursal->deleted_at) ? (string)$sucursal->deleted_at : null,

            'links' => [
                'rel' => 'self',
                'href' => route('sucursales.show', $sucursal->id),
            ],
            [
                'rel' => 'localidades',
                'href' => route('localidades.show', $sucursal->localidad->id),
            ],
        ];
    }

    public static function originalAttribute($index)
    {
        $attributes = [

            'identificador' => 'id',
            'sucursal' => 'nombre',
            'ubicacion' => 'direccion',
            'desde' => 'horario_inicio',
            'hasta' => 'horario_fin',
            'identificador_localidad' => 'localidad_id',
            'fecha_creacion' => 'created_at',
            'fecha_actualizacion' => 'updated_at',
            'fecha_eliminacion' =>'deleted_at',
        ];

        return isset($attributes[$index]) ? $attributes[$index] : null;
    }
}
