<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\DniValid;
use App\Rules\AlphaSpace;

class ClienteRequest extends FormRequest
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
           'dni'=> ['required','unique:clientes,dni','min:8','max:10', new DniValid()],
           'nombre' => ['required', new AlphaSpace(),'max:30'],
           'apellido'=>['required', new AlphaSpace(),'max:40'],
           'email'=> ['required','email','unique:clientes,email','max:40'],
/*           'localidad_id'=> ['required', 'numeric', 'min:1'],
           'user_id'=> ['required', 'numeric', 'min:1'], */
           'sexo_id'=> ['required', 'numeric', 'min:1'],
        ];
    }

    public function messages(){

        return [

            'dni.required'=> 'El :attribute es obligatorio',
            'dni.unique' => 'El :attribute ingresado ya existe',
            'dni.min'=> 'El :attribute debe contener como minimo 8 numeros',
            'dni.max'=> 'El :attribute debe contener como maximo 10 numeros',

            'nombre.required'=> 'El :attribute es obligatorio',
            'nombre.max'=> 'El :attribute debe contener como maximo 30 caracteres',

            'apellido.required'=> 'El :attribute es obligatorio',
            'apellido.max'=> 'El :attribute debe contener como maximo 40 caracteres',

            'email.required'=> 'El :attribute es obligatorio',
            'email.max'=> 'El :attribute debe contener como maximo 40 caracteres',
            'email.unique' => 'El :attribute ingresado ya existe',
            'email.email' => 'Formato del :attribute incorrecto',

/*            'localidad_id.required'=>'La localidad es obligatoria',
            'localidad_id.numeric' => 'La localidad debe ser numerica',
            'user_id.required'=>'El usuario es obligatorio',
            'user_id.numeric' => 'El id del usuario debe ser numerico', */
            'sexo_id.required'=>'El sexo es obligatorio',


         ];

    }
}
