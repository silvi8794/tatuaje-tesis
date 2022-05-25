<?php

namespace App\Http\Controllers;

use App\Models\Administrador;
use App\Models\Localidad;
use App\Models\Sexo;
use App\Models\User;
use App\Http\Requests\AdministradorRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;



class AdministradorController extends ApiController
{
     public function index()
    {
        $administrador = Administrador::with('localidad','sexo')->get();
        return $this->showAll($administrador);

    }

    public function create()
    {
        //return view("clientes.clientesCreate");
       //return view("welcome");

    }

    public function store(AdministradorRequest $request)
    {

        $campos = $request->all();


        $administrador = Administrador::create($campos);

        return $this->showOne($administrador, 201);


    }

    public function show($id)
    {
      $administrador = Administrador::where('id', '=', $id)->firstOrFail();
      return $this->showOne($administrador);
    }

   public function update(Request $request, Administrador $administrador)
    {

        $reglas = [

            'dni' => 'string|max:8|unique:administrador,dni,' . $administrador->id,
            'nombre' => 'string|max:30',
            'apellido' => 'string|max:40',
            'email' => 'email|max:40|unique:administrador,email,' . $administrador->id,
            'localidad_id' => 'min:1',
            'user_id'=>'min:1',
            'sexo_id' => 'min:1'
        ];

        $this->validate($request, $reglas);

        $administrador->fill($request->only([
            'dni',
            'nombre',
            'apellido',
            'email',
            'localidad_id',
            'user_id',
            'sexo_id'
         ]));


        if(!$administrador->isClear()) {
            return $this->errorResponse('Debe especificarse al menos un valor distinto para continuar con la actualizacion', 422);
        }

         $administrador->save();

        return $this->showOne($administrador, 201);

    }

    public function destroy(Administrador $administrador){

        $administrador = Administrador::find($id);

        $administrador->delete();

        return $this->showOne($administrador, 201);
    }

}
