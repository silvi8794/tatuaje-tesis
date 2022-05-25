<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WebUserFormRequest extends FormRequest
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
            'nombre'            => 'required|min:3|max:30|',
            'apellido'          => 'required|min:3|max:40|',

            'dni'               => 'required|min:8|max:10|nique:tatuadors,dni,null,'.$this->dni,
            'especialidad'      => 'required',

            'email'             => 'required|min:3|max:40|email|unique:users,email,null,id',

            'selectSucursal'    => 'required|integer|not_in:0',
            'selectLocalidad'   => 'required|integer|not_in:0',
            'selectSexo'        => 'required|integer|not_in:0',

            'password'          => 'required|confirmed|min:8',






        ];
    }

    public function messages()
    {
        return [
            'nombre.required'           => 'El :attribute es obligatorio',
            'nombre.max'                => 'El :attribute debe contener como maximo 30 caracteres',
            'nombre.min'                => 'El :attribute debe contener como minimo 3 caracteres',

            'apellido.required'         =>  'El :attribute es obligatorio',
            'apellido.max'              => 'El :attribute debe contener como maximo 40 caracteres',
            'apellido.min'              => 'El :attribute debe contener como minimo 3 caracteres',

            'dni.required'              =>  'El :attribute es obligatorio',
            'dni.unique'                => 'El :attribute ingresado ya existe',
            'dni.min'                   => 'El :attribute debe contener como minimo 8 caracteres',
            'dni.max'                   => 'El :attribute debe contener como maximo 10 caracteres',

            'email.required'            =>  'El :attribute es obligatorio',
            'email.max'                 => 'El :attribute debe contener como maximo 40 caracteres',
            'email.min'                 => 'El :attribute debe contener como minimo 3 caracteres',
            'email.unique'              => 'El :attribute ya existe',
            'email.email'               => 'Formato del :attribute incorrecto',

            'especialidad.required'     =>  'La :attribute es obligatorio',



            'selectSucursal.required'        =>  'La :attribute es obligatoria',
            'selectSucursal.not_in'          =>  'La :attribute es obligatoria',


            'selectLocalidad.required'        =>  'La :attribute es obligatoria',
            'selectLocalidad.not_in'          =>  'La :attribute es obligatoria',


            'selectSexo.required'        =>  'El :attribute es obligatorio',
            'selectSexo.not_in'          =>  'El :attribute es obligatorio',



            'password.required'         => 'La :attribute es obligatoria',
            'password.confirmed'         => 'Las Contraseñas no coinciden',
            'password.min'              => 'La :attribute debe contener como mínimo 8 caracteres',

        ];
    }

    public function attributes()
    {
        return [
            'nombre'                    => 'Nombre',
            'apellido'                  => 'Apellido',
            'dni'                       => 'DNI',
            'email'                     => 'Email',
            'especialidad'              => 'Especialidad',

            'selectSucursal'            => 'Sucursal',
            'selectLocalidad'           => 'Localidad',
            'selectSexo'                => 'Sexo',

            'password'                  => 'Contraseña',


        ];
    }
}
