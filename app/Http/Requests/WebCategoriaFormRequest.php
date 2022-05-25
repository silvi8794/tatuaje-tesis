<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WebCategoriaFormRequest extends FormRequest
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
            'nombre'                => 'required|min:3|max:30|unique:App\Models\Categoria,nombre',
        ];
    }

    public function messages()
    {
        return [
            'nombre.required'           =>  'El :attribute es obligatorio.',
            'nombre.unique'             =>  'Esta :attribute ya existe.',
            'nombre.min'                => 'La :attribute debe contener como minimo 3 caracteres',
            'nombre.max'                => 'La :attribute debe contener como maximo 30 caracteres',

        ];
    }

    public function attributes()
    {
        return [
            'nombre'                => 'categoria',


        ];
    }
}
