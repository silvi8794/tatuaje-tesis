<?php

namespace App\Transformers;

use App\Models\User;
use League\Fractal\TransformerAbstract;

class UserTransformer extends TransformerAbstract
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
    public function transform(User $user)
    {
        return [
             'identificador'=>(int)$user->id,
             //'documento'=>(string)$user->dni,
             //'nombre'=>(string)$user->nombre,
             //'apellido'=>(string)$user->apellido,
             'correo'=>(string)$user->email,
             'esVerificado' =>(int)$user->verified,
             'esAdministrador'=>($user->admin === 'true'),
             'identificador_tipo_usuario'=>(int)$user->tipouser_id,
             'identificador_sexo' => (int)$user->sexo_id,
             'fecha_creacion' => (string)$user->created_at,
             'fecha_actualizacion' => (string)$user->updated_at,
             'fecha_eliminacion' => isset($user->deleted_at) ? (string)$user->deleted_at : null,
        ];
    }

     public static function originalAttribute($index)
    {
        $attributes = [

            'identificador' => 'id',
            //'documento' => 'dni',
            //'nombre' => 'nombre',
            //'apellido' => 'apellido',
            'correo' => 'email',
            'identificador_tipo_usuario'=>'tipouser_id',
            'fecha_creacion' => 'created_at',
            'fecha_actualizacion' => 'updated_at',
            'fecha_eliminacion' => 'deleted_at',
        ];

        return isset($attributes[$index]) ? $attributes[$index] : null;
    }
}
