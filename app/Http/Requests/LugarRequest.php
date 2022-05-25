<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\AlphaSpace;


class LugarRequest extends FormRequest
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
            'nombre'=> ['required', new AlphaSpace(),'max:10'],
        ];
    }


    public function messages(){

        return [

            'nombre.required'=> 'El :attribute es obligatorio',
            'nombre.max'=> 'El :attribute no debe contener mas de 10 caracteres',

         ];    



    }    


}
