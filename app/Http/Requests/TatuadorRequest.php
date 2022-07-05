<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\DniValid;
use App\Rules\AlphaSpace;

class TatuadorRequest extends FormRequest
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


            'dni'=> ['required','unique:tatuadors,dni', new DniValid()],
            'nombre'=> ['required', new AlphaSpace(),'max:30'],
            'apellido'=> ['required', new AlphaSpace(),'max:30'],
            //'email'=> ['required','email','max:30'],
            'especialidad'=> ['required','max:70'],
            'estado'=> ['string'],
            'sucursal_id'=> 'required|numeric|exists:sucursals,id', 'min:1',
            'localidad_id'=>'required|exists:localidads,id',
            'sexo_id'=> 'required|numeric|exists:sexos,id', 'min:1',
            //'user_id'=> ['required', 'numeric', 'min:1'],


        ];
    }

     public function messages(){

        return [

            'dni.required'=> 'El :attribute es obligatorio',
            'dni.unique' => 'El :attribute ingresado ya existe',
            'nombre.required'=> 'El :attribute es obligatorio',
            'nombre.max'=> 'El :attribute no debe contener como maximo 30 caracteres',
            'apellido.required'=> 'El :attribute es obligatorio',
            'apellido.max'=> 'El :attribute no debe contener como maximo 40 caracteres',
            'email.required'=> 'El :attribute es obligatorio',
            'email.max'=> 'El :attribute no debe contener como maximo 40 caracteres',
            'email.unique' => 'El :attribute ingresado ya existe',
            'email.email' => 'Formato del :attribute incorrecto',
            'especialidad.required'=>'La especialidad ',
            'sucursal_id.required'=>'La sucursal es obligatoria',
            'localidad_id.required'=>'La localidad es obligatoria',
            'sexo_id.required'=>'El sexo es obligatorio',
            'user_id.numeric' => 'El id del usuario debe ser numerico',

         ];

    }
}
