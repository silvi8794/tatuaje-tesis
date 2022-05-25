<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\AlphaSpace;


class ProvinciaRequest extends FormRequest
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
            'nombre' => ['required', new AlphaSpace(),'max:30'],
        ];
    }

    public function messages(){

        return [
            'nombre.required'=>"El :attribute es obligatorio",
            'nombre.max'=>"El :attribute no debe superar los 30 caracteres",
            ];    

    }  
}
