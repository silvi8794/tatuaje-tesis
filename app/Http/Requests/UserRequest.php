<?php

namespace App\Http\Requests;

use App\Rules\DniValid;
use Illuminate\Foundation\Http\FormRequest;
use App\Rules\AlphaSpace;


class UserRequest extends FormRequest
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
           
           'email'=> ['required','email','unique:users,email','max:40'],
           'password'=> ['required','max:40'],
           'tipouser_id'=>  ['required','max:1'],
        ];
    }

     public function messages(){

        return [

            
            'email.required'=> 'El :attribute es obligatorio',
            'email.max'=> 'El :attribute no debe contener como maximo 40 caracteres',
            'email.unique' => 'El :attribute ingresado ya existe',
            'email.email' => 'Formato del :attribute incorrecto',
           'tipouser_id.required' =>'El :attribute es obligatorio',

         ];    

    }    
}
