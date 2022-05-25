<?php

namespace App\Http\Controllers;

use App\Models\Lugar;
use App\Models\LugarTatuaje;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;


class LugarTatuajeController extends ApiController
{
    public function index()
    {
    	$tatuajes = Lugar::with('tatuajes')->get();
    	return $this->showAll($tatuajes);

    }

     public function store(LugarTatuajeRequest $request)
    {
    	$LugarTatuaje=LugarTatuaje::create($request->all());
        
    }

     public function destroy($id){
    
    }
    	
}
