<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\AlphaSpace;

class SucursalRequest extends FormRequest
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
            
            'nombre'=> ['required', new AlphaSpace(),'max:50'],
            'direccion'=> ['required','max:50'],
            'horario_inicio'=> ['required','max:5'],
            'horario_fin'=> ['required','max:5'],
            'localidad_id'=> ['required', 'numeric', 'min:1'],
        ];
    }

    public function messages(){

        return [
            'nombre.required'=>"El :attribute es obligatorio",
            'nombre.max'=>"El :attribute no debe contener mas de 50 caracteres",
            'direccion.required'=>"La :attribute es obligatoria",
            'direccion.max'=>"La :attribute no debe contener mas de 50 caracteres",
            'horario_inicio.required'=>"El horario de inicio es obligatorio",
            'horario_fin.required'=>"El horario de fin es obligatorio",
            'localidad_id.required'=>"La localidad es obligatoria",
            ];    

    }
}
