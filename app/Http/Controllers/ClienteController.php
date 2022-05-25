<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Localidad;
use App\Models\Sexo;
use App\Models\User;
use App\Http\Requests\ClienteRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;

class ClienteController extends ApiController
{
    public function index()
    {
        $cliente = Cliente::with('localidad','sexo')->get();
        return $this->showAll($cliente);

    }

    public function create()
    {
        return view("clientes.clientesCreate");
       //return view("welcome");

    }

    public function store(ClienteRequest $request)
    {

        $campos = $request->all();


        //USER-TATUADOR-CLIENTE
        //$campos['password'] = bcrypt($request->password);
        //$campos['verified'] = User::usuario_no_verificado;
        //$campos['verification_token'] = User::generarVerificationToken();
        //$campos['admin'] = User::usuario_regular;

        //$uruario = User::create($campos);

        $cliente = Cliente::create($campos);

        return $this->showOne($cliente, 201);


    }

    public function show($id)
    {
      $cliente = Cliente::where('id', '=', $id)->firstOrFail();
      return $this->showOne($cliente);
    }

   public function update(Request $request, Cliente $cliente)
    {

        $reglas = [

            'dni' => 'string|min:8|max:10|unique:clientes,dni,' . $cliente->id,
            'nombre' => 'string|max:30',
            'apellido' => 'string|max:40',
            'email' => 'email|max:40|unique:clientes,email,' . $cliente->id,
            'localidad_id' => 'min:1',
            'user_id'=>'min:1',
            'sexo_id' => 'min:1'
            //'admin'=> 'in' . User:: usuario_administrador . ',' . User:: usuario_regular,
            //'password'=>'required|min:6|confirmed' USER
        ];

        $this->validate($request, $reglas);

        $cliente->fill($request->only([
            'dni',
            'nombre',
            'apellido',
            'email',
            'localidad_id',
            'user_id',
            'sexo_id'
         ]));


        if(!$cliente->isClear()) {
            return $this->errorResponse('Debe especificarse al menos un valor distinto para continuar con la actualizacion', 422);
        }

         $cliente->save();

        return $this->showOne($cliente, 201);

    }

    public function destroy(Cliente $cliente){

        $cliente = Cliente::find($id);

        $cliente->delete();

        return $this->showOne($cliente, 201);
    }

    /*public function optional(&$errors) {

        return isset($errors ? new Optional($errors)  : null;
    }*/
   /* public function optional($errors = null){

        return new Optional($errors ?? null);
    }*/
     /*public function optional($errors = null){

       return new Optional(isset($errors) ? $errors : null);
     }
*/
}
