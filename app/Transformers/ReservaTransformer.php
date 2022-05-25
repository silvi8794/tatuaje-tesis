<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Models\Reserva;

class ReservaTransformer extends TransformerAbstract
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
    public function transform(Reserva $reserva)
    {
        return [
            
            'identificador' => (int)$reserva->id,
            'identificador_cliente' => (int)$reserva->cliente_id,
            'identificador_tatuador' => (int)$reserva->tatuador_id,
            'identificador_tatuaje' => (int)$reserva->tatuaje_id,
            
            'fecha_creacion' => (string)$reserva->created_at,
            'fecha_actualizacion' => (string)$reserva->updated_at,
            'fecha_eliminacion' => isset($reserva->deleted_at) ? (string)$reserva->deleted_at : null,

            'links' => [
                'rel' => 'self',
                'href' => route('reservas.show', $reserva->id),
            ],
            [
                'rel' => 'clientes',
                'href' => route('clientes.show', $reserva->cliente->id),
            ],
            [
                'rel' => 'tatuadors',
                'href' => route('tatuadores.show', $reserva->tatuador->id),
            ],
            [
                'rel' => 'tatuajes',
                'href' => route('tatuajes.show', $reserva->tatuaje->id),
            ],
        ];
    }

    public static function originalAttribute($index)
    {
        $attributes = [

            'identificador' =>'id',
            'identificador_cliente' =>'cliente_id',
            'identificador_tatuador' =>'tatuador_id',
            'identificador_tatuaje' =>'tatuaje_id',
            'fecha_creacion' => 'created_at',
            'fecha_actualizacion' =>'updated_at',
            'fecha_eliminacion' =>'deleted_at',
        ];

        return isset($attributes[$index]) ? $attributes[$index] : null;
    }
}
