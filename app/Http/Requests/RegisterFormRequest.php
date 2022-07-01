<?php

namespace App\Http\Requests;

use App\Rules\AlphaSpace;
use App\Rules\DniValid;
use Illuminate\Foundation\Http\FormRequest;

class RegisterFormRequest extends FormRequest
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
            'email'             => 'required|between:3,64|email|unique:users,email,null,id',
            'password'          => 'required|min:8|confirmed:password-confirm',

            'dni'=> ['required','unique:clientes,dni','min:8','max:10', new DniValid()],
            'nombre' => ['required', new AlphaSpace(),'max:30'],
            'apellido'=>['required', new AlphaSpace(),'max:40'],
            'localidad_id'=>'required|exists:localidads,id',
            'sexo_id'=> 'required|numeric|exists:sexos,id', 'min:1',
        ];
    }

    public function messages()
    {
        return [
            'email.unique'                  => 'El :attribute ya existe',
            'email.required'                => 'El :attribute es requerido',
            'password.required'             => 'El :attribute es requerido',
            'password.min'                  => 'El :attribute debe contener 8 letras o numeros.',

        ];
    }

    public function attributes()
    {
        return [
            'email'             => 'Email',
            'password'          => 'Contraseña',

        ];
    }
}
