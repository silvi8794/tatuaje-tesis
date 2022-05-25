<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WebLugarFormRequest extends FormRequest
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
            'nombre'                => 'required|min:3||max:10|unique:App\Models\Lugar,nombre',
        ];
    }

    public function messages()
    {
        return [
            'nombre.required'           =>  'El :attribute es obligatorio',
            'nombre.unique'             =>  'Este :attribute ya existe.',
            'nombre.min'                => 'El :attribute debe contener como minimo 3 caracteres',
            'nombre.max'                => 'El :attribute debe contener como maximo 11 caracteres',



        ];
    }

    public function attributes()
    {
        return [
            'nombre'                => 'lugar',


        ];
    }
}
