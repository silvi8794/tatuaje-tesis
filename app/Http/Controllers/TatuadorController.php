<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tatuador;
use App\Models\Sucursal;
use App\Models\Localidad;
use App\Models\Sexo;
use App\Models\User;
use App\Http\Requests\TatuadorRequest;
use App\Http\Controllers\ApiController;


class TatuadorController extends ApiController
{
    public function index()
    {
        $tatuador = Tatuador::with('sucursal','localidad')->get();
        return $this->showAll($tatuador);
    }

     public function store(TatuadorRequest $request)

    {
        $campos = $request->all();
        
        $tatuador = Tatuador::create($campos);

        return $this->showOne($tatuador, 201);

    }
    public function show($id)
    {
        $tatuador = Tatuador::where('id', '=', $id)->firstOrFail();
        return $this->showOne($tatuador);
    }


   public function update(Request $request, Tatuador $tatuador)
    {    
            
        $reglas = [
            'dni'=>'integer|max:8|unique:tatuadors,dni,' . $tatuador->id,
            'nombre'=> 'string|max:30',
            'apellido'=>'string|max:30',
            'email'=>'email|max:30|unique:tatuadors,email,' . $tatuador->id,
            'especialidad'=>'string|max:70',
            'estado' => 'in: ' . Tatuaje::TATUADOR_DISPONIBLE . ',' . Tatuaje::TATUADOR_NO_DISPONIBLE,
            'sucursal_id'=>'min:1',
            'localidad_id'=>'min:1',
            'sexo_id'=>'min:1',
            'user_id'=>'min:1'

        ];
        $this->validate($request, $reglas);

         $tatuadores->fill($request->only([
            'dni',
            'nombre',
            'apellido',
            'email',
            'especialidad',
            'estado',
            'sucursal_id',
            'localidad_id',
            'sexo_id',
            'user_id'
         ]));

         /*if($request->has('estado')) {
            $tatuador->estado = $request->estado;

            if($tatuador->estaActivado(){
                return $this->errorResponse('Un tatuaje activo debe tener asociada al menos una categoria', 409);
                }
        }
*/

        if(!$tatuador->isDirty()) {
            return $this->errorResponse('Debe especificarse al menos un valor distinto para continuar con la actualizacion', 422);
        }

         $tatuador->save();

        return $this->showOne($tatuador, 201);


    }
    public function destroy($id){

        $tatuador = Tatuador::where('id', '=', $id)->firstOrFail();

        if($tatuador->sucursales()->count()>0)
        {
            return $this->errorResponse('No se puede eliminar el tatuador por estar asociado a una o mas sucursales', 409);
        }
        if($tatuador->localidades()->count()>0)
        {
            return $this->errorResponse('No se puede eliminar el tatuador por estar asociado a una o mas localidades', 409);
        }
         if($tatuador->sexos()->count()>0)
        {
            return $this->errorResponse('No se puede eliminar el tatuador por estar asociado a un sexo', 409);
        }
         if($tatuador->users()->count()>0)
        {
            return $this->errorResponse('No se puede eliminar el tatuador por estar asociado a una o mas localidades', 409);
        }
        if(Reserva::where('tatuador_id', $tatuador->id)->exists()){
            return $this->errorResponse('No se puede eliminar el tatuador por estar asociado a una o mas reservas', 409);
        }
        if(Tatuador::where('estado', $tatuador->id)->exists()){
            return $this->errorResponse('No se puede eliminar el tatuador por estar en estado disponible', 409);
        }



        $tatuador->delete();

        return $this->showOne($tatuador, 201);

    }

    public function trash()
    {
        //onlyTrashed trae solo los eliminados
        $tatuador=Tatuador::onlyTrashed()->get();

        //return view('usuarios.listadoTrash',compact('usuarios'));
        return $this->showAll($tatuador);
    }
        
        
    
    public function restore($id)
    {
        $tatuador = Tatuador::withTrashed()->where('id', '=', $id)->firstOrFail();
        $tatuador->restore();
        //return redirect('tatuadores');

        return $this->showOne($tatuador);

    }

    public function edit($id)
    {
        $tatuador = Tatuador::with('sucursal','localidad','sexo','user')->firstOrFail($id);
        return response()->json(
            $tatuador->toArray()
        );
    }


    /*public function valido_email(Request $request)
    {        
       $user= User::where('email', $request['email'])->get();    
        if (count($user) > 0){
           return 1;
        }
        else  {
           return 0;
        }
    }*/
}
