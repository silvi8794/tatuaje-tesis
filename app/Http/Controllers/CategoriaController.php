<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;
use App\Http\Requests\CategoriaRequest;
use App\Http\Controllers\CategoriaController;

class CategoriaController extends ApiController
{
    public function index()
    {
        $categorias = Categoria::all();
        return $this->showAll($categorias);
    }

    public function store(CategoriaRequest $request)
    {
        $campos = $request->all();
        $categoria = Categoria::create($campos);

        return $this->showOne($categoria, 201);
    }

    public function show($id)
    {
       $categoria = Categoria::where('id', '=', $id)->firstOrFail();
       return $this->showOne($categoria); 
    }

   public function update(Request $request, Categoria $categoria)
    {
      $reglas = [
        'nombre' => 'string|max:15'
      ];

      $this->validate($request, $reglas);    
      //laravel 5.5 only sino intersect
       $categoria-> fill($request->only([  
            'nombre',
       ]));

       if ($categoria->isClean()){
            return $this-> errorResponse('Debe especificar al menos un valor diferente para actualizar', 422);
       }

       $categoria-> save();

       return $this-> showOne($categoria);
    }

    public function edit($id)
    {
        $categoria = Categoria::findOrFail($id);
        return response()->json(
            $categoria->toArray()
        );
    }

    public function trash()
    {
        //onlyTrashed trae solo los eliminados
        $categoria=Categoria::onlyTrashed()->get();

        //return view('usuarios.listadoTrash',compact('usuarios'));
        return $this->showAll($categoria);
    }
        
        
    
    public function restore($id)
    {
        $categoria = Categoria::withTrashed()->where('id', '=', $id)->firstOrFail();
        $categoria->restore();
        //return redirect('tatuadores');

        return $this->showOne($categoria);

    }

   //public function update(Request $request, $id)
    //{    
            
      //  $categoria = Categoria::findOrFail($id);
        //$categoria->fill([
          //  'nombre' => $request['nombre'],
            
        //]);
        //$categoria->save();
        //return redirect('categorias');
    //}


    public function destroy($id)
    {
    	  $categorias = Categoria::where('id', '=', $id)->firstOrFail();
        $categorias->delete();
        return $this->showOne($categorias, 201);
    }
}
