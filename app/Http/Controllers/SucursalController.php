<?php

namespace App\Http\Controllers;

use App\Models\Sucursal;
use App\Http\Requests\SucursalRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;


class SucursalController extends ApiController
{
     public function index()
    {
        $sucursales = Sucursal::all();
        return $this->showAll($sucursales);
    
    }

    public function store(SucursalRequest $request)
    {
        $campos = $request->all();
        $sucursales = Sucursal::create($campos);
        return $this->showOne($sucursales, 201);
        
    }


     public function show($id)
    {
        $sucursal = Sucursal::where('id', '=', $id)->firstOrFail();
        return $this->showOne($sucursal);
    }

    public function destroy($id){

        $sucursal = Sucursal::where('id', '=', $id)->firstOrFail();
        $sucursal->delete();
        return $this->showOne($sucursal, 201);
    }

    public function trash()
    {
        //onlyTrashed trae solo los eliminados
        $sucursal=Sucursal::onlyTrashed()->get();

        //return view('usuarios.listadoTrash',compact('usuarios'));
        return $this->showAll($sucursal);
    }
        
        
    
    public function restore($id)
    {
        $sucursal = Sucursal::withTrashed()->where('id', '=', $id)->firstOrFail();
        $sucursal->restore();
        //return redirect('tatuadores');

        return $this->showOne($sucursal);

    }

    public function edit($id)
    {
        $sucursal = Sucursal::with('localidad')->findOrFail($id);
        return response()->json(
            $sucursal->toArray()
        );
    }

   public function update(Request $request, $id)
    {    

         $reglas = [

            'nombre' => 'string|max:50',
            'direccion' => 'string|max:50',
            'horario_inicio' => 'string|max:5',
            'horario_fin' => 'string|max:5',
            'localidad_id' => 'min:1',
        ];

        $this->validate($request, $reglas);
            
        //$sucursal = Sucursal::findOrFail($id);
        $sucursal->fill($request->only([
            'nombre',
            'direccion',
            'horario_inicio',
            'horario_fin',
            'localidad_id'
         ]));
            
        if(!$sucursal->isDirty()) {
            return $this->errorResponse('Debe especificarse al menos un valor distinto para continuar con la actualizacion', 422);
        }

         $sucursales->save();

        return $this->showOne($sucursal, 201);


    }
}
