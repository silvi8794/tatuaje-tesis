<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\DniValid;
use App\Rules\AlphaSpace;


class TatuajeRequest extends FormRequest
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

            //'categoria_id'=> ['required', 'numeric', 'min:1'],
            'fuente'=> ['required', new AlphaSpace(),'max:30'],
            'tamaño'=> ['required', new AlphaSpace(),'max:10'],
            'nombre'=> ['required', new AlphaSpace(),'max:50'],
            //'estado'=> ['string'],
            //'imagen'=>'required',
        ];
    }

    public function message(){
        
        return [

            //'categoria_id.required'=>'La categoria es obligatoria',
            'fuente.required'=>'La fuente es obligatoria',
            'tamaño.required'=>'El tamaño es obligatoria',
            'nombre.required'=>'El nombre es obligatorio',


        ];

       } 
}
