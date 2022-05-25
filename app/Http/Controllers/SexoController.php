<?php

namespace App\Http\Controllers;

use App\Models\Sexo;
use App\Http\Requests\SexoRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;



class SexoController extends ApiController
{
     public function index()
    {
    	$sexos = Sexo::all();
        return $this->showAll($sexos);

    }

    public function store(SexoRequest $request)
    {
    	$campos = $request->all();

        $sexo = Sexo::create($campos);

        //$tatuajes = [11,12,13];

        //$sexo->tatuajes()->attach($tatuajes);

        return $this->showOne($sexo, 201);
    }

     public function show($id)
    {
        $sexo = Sexo::where('id', '=', $id)->firstOrFail();
        return $this->showOne($sexo);
        
    }

    public function update(Request $request, Sexo $sexo)
    {
      $reglas = [
        'nombre' => 'string|max:9'
      ];

      $this->validate($request, $reglas);    
      
       $sexo-> fill($request->only([  
            'nombre',
       ]));

       if ($sexo->isClean()){
            return $this-> errorResponse('Debe especificar al menos un valor diferente para actualizar', 422);
       }

       $sexo-> save();
       //$tatuajes_edit = [1, 2];

       //$sexo->tatuajes()->sync($tatuajes_edit);
       
       return $this-> showOne($sexo,201);
    }

    public function destroy(Sexo $sexo){

        $sexo->delete();
        return $this->showOne($sexo, 201);
    }
}