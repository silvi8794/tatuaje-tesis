<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\TipoUser;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Http\Controllers\ApiController;

class UserController extends ApiController
{
    public function index()
    {
         $usuarios = User::orderBy('id', 'DESC')->get();
         return $usuarios;
         $usuarios = User::with('tipouser')->get();;
         return $this->showAll($usuarios);

    }

    public function show($id)
    {
         $usuario = User::where('id','=',$id)->firstOrFail();
         return $this->showOne($usuario);

    }

     public function store(UserRequest $request)
    {

         $rules = [

                 'email'=>'required|email|unique:users',
                 'password'=>'required|min:8|confirmed',
                 'tipouser_id'=>'required|min:1',

         ];

         $this ->validate($request, $rules);

         $campos = $request->all();

         //USER-TATUADOR-CLIENTE
         $campos['password'] = bcrypt($request->password);
         $campos['verified'] = User::usuario_no_verificado;
         $campos['verification_token'] = User::generarVerificationToken();
         $campos['admin'] = User::usuario_regular;

          $usuario = User::create($campos);
         return response()->json(['data'=> $usuario], 201);
    }


    public function update(Request $request, $id) {

         $user = User::findOrFail($id);


         $rules = [

                 'email'=>'email|max:40|unique:users,email',//. $user->id,
                 'password'=>'min:8|confirmed',
                 'admin' => 'in:' . User::usuario_administrador . ','. User::usuario_regular,

         ];

         $this -> validate($request, $rules);



          if($request-> has('email') && $user->email = $request->email){
                $user->verified = User::usuario_verificado;
                $user->verification_token = User::generarVerificationToken();
                $user->email = $request->email;
            }

         if($request-> has('password')){
            $user->password= bcrypt($request->password);
          }

          //El codigo de error 409 implica que  tenemos un conflicto con la     peticion que realizo el usuario

         if($request-> has('admin')){
            if(!$user->esVerificado()){
                return $this-> errorResponse('Unicamente los usuarios verificadospueden cambiar su valor de administrador', 409);
            }

            $user->admin= $request->admin;
         }

         if(!$user->isDirty()){
            return $this-> errorResponse('Debe especificarse al menos un valor distinto para continuar con la actualizacion',422);
         }


         $user->save();

          return $this->showOne($user, 201);
     }

     public function destroy($id) {

        $user = User::findOrFail($id);
        $user->delete();

        return $this->showOne($user, 201);
     }

     public function verify($token) {

        $user = User::where('verification_token', $token)->firstOrFail();

        $user->verified = User::usuario_verificado;
        $user->verification_token = null;

        $user->save();

        return $this->showMessage('La cuenta ha sido verificada');

     }
}
