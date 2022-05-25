<?php

namespace App\Http\Controllers;

use App\Models\Tatuaje;
use App\Models\Lugar;
use App\Models\Sexo;
use App\Models\LugarTatuaje;
use Illuminate\Http\Request;
use App\Http\Requests\TatuajeRequest;
use App\Http\Controllers\ApiController;
use Illuminate\Support\Facades\Storage;


class TatuajeController extends ApiController
{
    public function index()
    {
        $tatuaje = Tatuaje::with('categorias','lugares','sexos')->get();
        return $this->showAll($tatuaje);

    }
    

    public function store(TatuajeRequest $request)
    {
        $campos = $request->all();        
        //
        //$campos['estado']=Tatuaje::tatuaje_desactivado;
        
            if ($request->hasFile('imagen')) {
                $photo = time() . '.' . $request->imagen->getClientOriginalName();
                $request->imagen->move(public_path('img'), $photo);
                $path_image = "img" . $photo;
            }
            
        //$campos['imagen'] = $path_image;
        $tatuaje = Tatuaje::create($campos);

        //dd($categorias); //ve que tiene la variable y corta la ejecucion
        $categorias = [1,2];
        $lugares = [1,2,3];
        $sexos = [1];
        
        $tatuaje->categorias()->attach($categorias);
        $tatuaje->lugares()->attach($lugares);
        $tatuaje->sexos()->attach($sexos);

        //$tatuaje->categorias->attach(2);
        //$tatuaje->lugares()->attach(1);
        //$tatuaje->sexos()->attach($sexos);

        return $this->showOne($tatuaje, 201);
    }


    public function show($id)
    {
        $tatuaje = Tatuaje::where('id', '=', $id)->firstOrFail();
        return $this->showOne($tatuaje); 
    }

   public function update(Request $request, Tatuaje $tatuaje)
    {    
            
        $tatuaje = Tatuaje::findOrFail($id);
        $rules=[
            //'categoria_id'=>'min:1',
            'fuente'=> ['fuente'],
            'tamaño'=>['tamaño'],
            'nombre'=>'string|max:30',
            'imagen'=>['image'],

            'estado' => 'in: ' . Tatuaje::tatuaje_activo . ',' . Tatuaje::tatuaje_desactivado
        ];

        $this->validate($request, $rules);
            $tatuaje->imagen = $request->imagen;

       $tatuaje->fill($request->only([
                      'nombre',
                      'fuente',
                      'tamaño',
      ]));

         /*if($request->has('estado')) {
            $tatuaje->estado = $request->estado;

            if($tatuaje->estaActivado() && $tatuaje->categorias()->count()== 0) {
                return $this->errorResponse('Un tatuaje activo debe tener asociada al menos una categoria', 409);
                }
        }*/

         if(!$tatuaje->isDirty()) {
           return $this->errorResponse('Debe especificarse al menos un valor distinto para continuar con la actualizacion', 422);
        }
            
        $tatuaje->save();
        return $this->showOne($tatuaje,201);
    }

    public function destroy(Tatuaje $tatuaje){
        
        
        $tatuaje->delete();

        return $this->showOne($tatuaje,200);
    }

    public function trash()
    {
        //onlyTrashed trae solo los eliminados
        $tatuajes=Tatuaje::onlyTrashed()->get();

        //return view('usuarios.listadoTrash',compact('usuarios'));
        return $this->showAll($tatuajes);
    }
        
        
    
    public function restore($id)
    {
        $tatuaje = Tatuaje::withTrashed()->where('id', '=', $id)->findOrFail();
        $tatuaje->restore();
        //return redirect('tatuadores');

        return $this->showOne($tatuaje);

    }

  
//}
    }
