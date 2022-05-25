<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WebUserAdminFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'dni'               => 'required|min:8|max:10|unique:administradors,dni,null,'.$this->dni,

            'nombre'            => 'required|min:3|max:30|',
            'apellido'          => 'required|min:3|max:40|',

            'email'             => 'required|min:3|max:40|email|unique:users,email,null,id',

            'selectLocalidad'   => 'required|integer|not_in:0',
            'selectSexo'        => 'required|integer|not_in:0',
            'password'          => 'required|confirmed|min:6',




        ];
    }

    public function messages()
    {
        return [
            'dni.required'              =>  'El :attribute es obligatorio',
            'dni.unique'                => 'El :attribute ingresado ya existe',
            'dni.min'                   => 'El :attribute debe contener como minimo 8 caracteres',
            'dni.max'                   => 'El :attribute debe contener como minimo 10 caracteres',


            'nombre.required'           =>  'El :attribute es obligatorio',
            'nombre.min'                => 'El :attribute debe contener como minimo 3 caracteres',
            'nombre.max'                => 'El :attribute debe contener como maximo 30 caracteres',

            'apellido.required'         =>  'El :attribute es obligatorio',
            'apellido.min'                => 'El :attribute debe contener como minimo 3 caracteres',
            'apellido.max'              => 'El :attribute debe contener como maximo 40 caracteres',


            'email.required'            => 'El :attribute es obligatorio',
            'email.max'                 => 'El :attribute debe contener como maximo 40 caracteres',
            'email.min'                 => 'El :attribute debe contener como minimo 3 caracteres',
            'email.unique'              => 'El :attribute ingresado ya existe',
            'email.email'               => 'Formato del :attribute incorrecto',


            'selectLocalidad.required'        =>  'La :attribute es obligatorio',
            'selectLocalidad.not_in'          =>  'La :attribute es obligatorio',


            'selectSexo.required'        =>  'El :attribute es obligatorio',
            'selectSexo.not_in'          =>  'El :attribute es obligatorio',



            'password.required'         => 'La :attribute es obligatoria',
            'password.confirmed'        => 'Las Contraseñas no coinciden',
            'password.min'              => 'La :attribute debe contener como mínimo 6 caracteres',

        ];
    }

    public function attributes()
    {
        return [
            'dni'                       => 'DNI',
            'nombre'                    => 'Nombre',
            'apellido'                  => 'Apellido',
            'email'                     => 'Email',

            'selectLocalidad'           => 'Localidad',
            'selectSexo'                => 'Sexo',

            'password'                  => 'Contraseña',


        ];
    }
}
