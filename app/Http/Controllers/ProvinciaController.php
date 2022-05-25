<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Provincia;
use App\Http\Requests\ProvinciaRequest;
use App\Http\Controllers\ApiController;



class ProvinciaController extends ApiController
{
    public function index()
    {
        $provincias = Provincia::orderBy('id', 'DESC')->get();
        return $provincias;
        $provincias = Provincia::all();
        return $this->showAll($provincias);
    }

    
     public function show($id)
     {
        $provincia = Provincia::where('id', '=', $id)->firstOrFail();
        return $this->showOne($provincia); 
     }

    public function store(ProvinciaRequest $request)
    {
        //Instanciamos la clase provincia
        $provincia = new Provincia;

        //Declaramos el nombre con el nombre enviado en el request
        $provincia->nombre = $request->nombre;

        //Guardamos el cambio en el modelo
        $provincia->save();

        return 'Provincia cargada con exito ';
        
        $campos = $request->all();
        $provincias = Provincia::create($campos);
        return $this->showOne($provincias, 201);
        
    }

    public function destroy($id){
        $provincia = Provincia::find($id);
        $provincia->delete();

        return'Provincia eliminada con exito';
    }

   // public function destroy(Provincia $provincias){
     //   $provincias = Provincia::findOrFail($id);
       // $provincias->delete();
        //return $this->showOne($provincias, 201);
    //}
}

