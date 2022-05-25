<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\CategoriaTatuajeController;

class CategoriaTatuajeController extends ApiController
{
    public function index()
    {	
    	$tatuajes = Categoria::with('tatuajes')->get();
    	return $this->showAll($tatuajes);
    }

    /*public function update(Request $request,Categoria $categoria, Tatuaje $tatuaje)
    {	//SYNC, ATTACH, SYNCWITHOUTDATACHING
    	 //id de la categoria que vamos a agregar
    	$tatuajes = Categoria()->syncWithoutDataching([$categoria->id]);
    	return $this->showAll($tatuajes->Categoria);
    }

    
 //public function destroy($id){
    //    $categoria_tatuaje = CategoriaTatuaje::find($id);
      //  $categoria_tatuaje->delete();
   
    public function destroy(Categoria $categoria, Tatuaje $tatuaje)
    {
    	if ($tatuaje = Categoria()->find[$categoria->id]) {
       		return $this->errorResponse('La categoria especificada no es una categoria de este tatuaje', 404); 

    	}
        */

    

        //en caso de que si exista eliminamos por el metodo detach 
  //      $tatuajes = Categoria()->detach([$categoria->id]);
    //    return $this->showAll($tatuajes->Categoria);
    
}
