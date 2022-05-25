<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WebSucursalFormRequest extends FormRequest
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
            'nombre'                => 'required|min:3|max:50|',
            'direccion'             => 'required|min:5|max:50|unique:sucursals',
            'horario_inicio'        => 'required',
            'horario_fin'           => 'required',
            'selectLocalidad'       => 'required|integer|not_in:0',
        ];
    }

    public function messages()
    {
        return [
            'nombre.required'           =>  'La :attribute es obligatorio',
            'nombre.min'                => 'La :attribute debe contener como minimo 3 caracteres',
            'nombre.max'                => 'La :attribute debe contener como maximo 50 caracteres',

            'direccion.required'         => 'La :attribute es obligatoria',
            'direccion.max'              => 'La :attribute debe contener como minimo 5 caracteres',
            'direccion.max'              => 'La :attribute debe contener como maximo 50 caracteres',
            'direccion.unique'           => 'Esta :attribute ingresada ya existe',

            'horario_inicio.required'         =>  'El :attribute es obligatorio',
            'horario_fin.required'            =>  'El :attribute es obligatorio',

            'selectLocalidad.required'        =>  'La :attribute es obligatorio',
            'selectLocalidad.not_in'          =>  'La :attribute es obligatorio',



        ];
    }

    public function attributes()
    {
        return [
            'nombre'                => 'Sucursal',
            'direccion'             => 'Dirección',
            'horario_inicio'        => 'Horario de apertura',
            'horario_fin'           => 'Horario de cierre',
            'selectLocalidad'       => 'Localidad',


        ];
    }
}
