<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\AlphaSpace;

class WebWelcomeFormRequest extends FormRequest
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
            'nombre' => ['required', new AlphaSpace(),'min:3','max:30'],
            'email' => ['required','email','unique:users,email','min:3','max:40'],
            'motivo'  => ['required',new AlphaSpace(),'min:5','max:80'],
            'mensaje'  => ['required',new AlphaSpace(),'min:5','max:1000'],
        ];

    }

    public function messages()
    {
    	 return [

            'nombre.required'=> 'El :attribute es obligatorio',
            'nombre.min'=>'El :attribute no debe contener mas de 3 caracteres',
            'nombre.max'=>'El :attribute no debe contener mas de 30 caracteres',

            'email.required'=> 'El :attribute es obligatorio',
            'email.min'=>'El :attribute no debe contener mas de 3 caracteres',
            'email.max'=> 'El :attribute no debe contener como maximo 40 caracteres',
            'email.unique' => 'El :attribute ingresado ya existe',
            'email.email' => 'Formato del :attribute incorrecto',

            'motivo.required'=> 'El :attribute es obligatorio',
            'motivo.min'=>'El :attribute no debe contener tan pocos caracteres',
            'motivo.max'=>'El :attribute no debe contener tantos caracteres',

            'mensaje.required'=> 'El :attribute es obligatorio',
            'mensaje.min'=>'El :attribute no debe contener tan pocos caracteres',
            'mensaje.max'=>'El :attribute no debe contener tantos caracteres',


         ];

    }
    public function attributes()
    {
        return [
        	'nombre' 			=> 'Nombre',
            'email'             => 'Email',
            'motivo'             => 'Motivo',
            'mensaje'             => 'Mensaje',

        ];
    }


}
