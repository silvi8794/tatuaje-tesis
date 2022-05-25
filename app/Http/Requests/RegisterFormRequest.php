<?php

namespace App\Http\Requests;

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
