<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Localidad;
use App\Http\Requests\LocalidadRequest;
use App\Http\Controllers\ApiController;



class LocalidadController extends ApiController
{
    public function index()
    {
    	$localidades = Localidad::with('provincia')->get();
    	return $this->showAll ($localidades);
    }

    public function store(LocalidadRequest $request)
    {
    	$campos = $request->all();
        $localidades = Localidad::create($campos);
        return $this->showOne($localidades, 201);
    }

    public function show($id){
        $localidad = Localidad::where('id', '=', $id)->firstOrFail();
        return $this->showOne($localidad); 
     }


     public function destroy(Localidad $localidad){
        $localidad->delete();
        return $this->showOne($localidad, 201);
    }
}

