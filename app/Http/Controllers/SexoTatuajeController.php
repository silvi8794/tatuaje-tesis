<?php

namespace App\Http\Controllers;

use App\Models\Tatuaje;
use App\Models\Sexo;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;



class SexoTatuajeController extends ApiController
{
    public function index()
    {
        $tatuajes = Sexo::with('tatuajes')->get();
        return $this->showAll($tatuajes);
    }

    public function store(SexoTatuajeRequest $request)
    {
        
    }

    public function destroy($id)
    {
        
    }
}

