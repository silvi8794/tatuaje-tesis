<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\AlphaSpace;


class ReservaRequest extends FormRequest
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
            'cliente_id'=> ['required', 'numeric', 'min:1'],
            'tatuador_id'=> ['required', 'numeric', 'min:1'],
            'tatuaje_id'=> ['required', 'numeric', 'min:1'],
        
            
        ];
    }
     public function messages(){

        return [
               'cliente_id.required'=>'El cliente es obligatorio',
               'tatuador_id.required'=>'El tatuador es obligatorio',
               'tatuaje_id.required'=>'El tatuaje es obligatorio',
            ];    

    }   
}
