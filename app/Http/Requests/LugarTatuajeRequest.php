<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\AlphaSpace;


class LugarTatuajeRequest extends FormRequest
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
            'lugar_id'=> ['required', 'numeric', 'min:1'],
            'tatuaje_id'=> ['required', 'numeric', 'min:1'],
        ];
    }
    public function messages(){

        return [
            'lugar_id.required'=>"El Lugar debe ser obligatorio",
            'tatuaje_id.required'=>"El tatuaje debe ser obligatorio",
             ];    



    }   
}
