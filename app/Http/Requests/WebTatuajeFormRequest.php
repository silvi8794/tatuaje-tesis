<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WebTatuajeFormRequest extends FormRequest
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
            'nombre'                => 'required|unique:App\Models\Categoria,nombre|max:50|min:3|',
            'fuente'                => 'required|min:3|max:30',
            'tamaño'                => 'required|max:10',
            'selectCategoria'       => 'required|array|not_in:0',
            'image'                 => 'required',
        ];
    }

    public function messages()
    {
        return [
            'nombre.required'           =>  'El :attribute es obligatorio',
            // 'nombre.unique'             =>  'El :attribute ya existe',
            'nombre.max'                => 'El :attribute debe contener como maximo 50 caracteres',
            'nombre.min'                => 'El :attribute debe contener como minimo 3 caracteres',

            'fuente.required'           =>  'El :attribute es obligatorio',
            // 'fuente.unique'             =>  'El :attribute ya existe',
            'fuente.max'                => 'La :attribute debe contener como maximo 30 caracteres',
            'fuente.min'                => 'La :attribute debe contener como minimo 3 caracteres',

            'tamaño.required'           =>  'El :attribute es obligatorio',
            'tamaño.unique'             =>  'El :attribute ya existe',

            'image.required'           =>  'La :attribute es obligatorio',

            'selectCategoria.required'        =>  'La :attribute es obligatoria',
            'selectCategoria.not_in'          =>  'La :attribute debe ser seleccionada',

        ];
    }

    public function attributes()
    {
        return [
            'nombre'                => 'nombre',
            'fuente'                =>  'fuente',
            'tamaño'                =>  'tamaño',
            'selectCategoria'       =>  'categoria',
            'image'                 => 'imagen',

        ];
    }
}
