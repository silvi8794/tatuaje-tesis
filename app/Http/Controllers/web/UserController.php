<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Models\Localidad;
use App\Models\Sucursal;
use App\Models\Sexo;
use App\User;


use Illuminate\Support\Str;
use App\Mail\WelcomeMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Contracts\Mail\Mailable;

use Exception;
use Auth;
use Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

use App\Helpers\Notification;
use Illuminate\Support\Facades\Auth as FacadesAuth;

use App\Http\Requests\WebUserFormRequest;
use App\Mail\EnviarCuentaDeUsuario;
use App\Models\Cliente;
use App\Models\Tatuador;
use App\Models\TipoUser;
use App\Models\WebDatoUsuario;

use App\Models\User as ModelsUser;
use Illuminate\Http\Request;



class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = WebDatoUsuario::with(['user' => function ($queryTypeUser) {
            $queryTypeUser->with('user_type')->get();
        }])->with('sexo')->with('localidad')->with('sucursal')->where('user_id', '<>', Auth::user()->id)->get();

        return view('administracion.users.list', compact('users'));
    }

    public function restoreList(){
        $users = WebDatoUsuario::with(['user' => function ($queryTypeUser) {
            $queryTypeUser->with('user_type')->get();
        }])->where('user_id', '<>', Auth::user()->id)->onlyTrashed()->get();
        return view('administracion.users.list_restore', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sucursales = Sucursal::all();
        $sexos = Sexo::all();
        $localidades = Localidad::with('provincia')->get();
        return view('administracion.users.create', compact('sucursales', 'sexos', 'localidades'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(WebUserFormRequest $request)
    {
        $password = $request->password;


        try {
            DB::beginTransaction();


            $userExist = User::where('email', $request->email)->first();
            $dniTatuador = Tatuador::where('dni',$request->dni)->orWhere('email', $request->email)->first();
            if (is_null($userExist) && is_null($dniTatuador)) {

                $tipoUsuario = TipoUser::where('nombre', 'tatuador')->first();
                //agregue estas linea para verificar token
                $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
                $verified_token =  substr(str_shuffle($permitted_chars), 0, 30);
                $usuario = ModelsUser::create([
                    'email'                 =>  $request->email,
                    'password'              =>  Hash::make($password),
                    'admin'                 =>  '-',
                    'tipouser_id'           =>  $tipoUsuario->id,
                    'verification_token'    =>  $verified_token,
                ]);
                //agregue esta linea TOKEN

                $usuarioTatuador = Tatuador::create([
                    'dni'              => $request->dni,
                    'nombre'           => $request->nombre,
                    'apellido'         => $request->apellido,
                    'email'            => $request->email,
                    'especialidad'     => $request->especialidad,
                    'estado'           => '',
                    'sucursal_id'      => $request->selectSucursal,
                    'localidad_id'     => $request->selectLocalidad,
                    'sexo_id'          => $request->selectSexo,
                    'user_id'          => $usuario->id,
                ]);


                if (!is_null($usuario && $usuarioTatuador)) {

                    $usuario->pass = $password;

                  Mail::to($usuario->email)->send(new EnviarCuentaDeUsuario($usuario, $usuarioTatuador));
                    DB::commit();

                    $notification = Notification::Notification('Tatuador creado exitosamente verifique su correo por favor', 'success');
                    if (isset($request->save)) {
                        return redirect('users/index')->with('notification', $notification);
                    }
                    if (isset($request->saveAdd)) {
                        return redirect('users/create')->with('notification', $notification);
                    }
                } else {

                    $notification = Notification::Notification('Tatuador no creado', 'error');
                    return redirect('users/create')->with('notification', $notification);
                }
            }else {
                $notification = Notification::Notification('Tatuador no creado, el email o DNI ya existe', 'error');
                return redirect('users/create')->with('notification', $notification);
            }


        } catch (\Exception $e) {

            DB::rollBack();
            $notification = Notification::Notification('Error', 'error');
            return redirect('users/create')->with('notification', $notification);
        }
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(WebDatoUsuario $user)
    {
        $user = WebDatoUsuario::with('sexo')->with('localidad')->with('sucursal')->where('id', $user->id)->first();
        $sucursales = Sucursal::all();
        $sexos = Sexo::all();
        $localidades = Localidad::all();
        return view('administracion.users.edit', compact('user', 'sucursales', 'sexos', 'localidades'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, WebDatoUsuario $user)
    {

        try {
            DB::beginTransaction();

            $user->nombre           = $request->nombre;
            $user->apellido         = $request->apellido;
/*             $user->dni              = $request->dni; */
            $user->especialidad     = $request->especialidad;
            $user->sucursal_id      = $request->selectSucursal;
            $user->localidad_id     = $request->selectLocalidad;
            $user->sexo_id          = $request->selectSexo;
            $user->save();

            if (!is_null($user)) {

                DB::commit();
                $notification = Notification::Notification('Tatuador actualizado satisfactoriamente', 'success');

                return redirect('users/index')->with('notification', $notification);
            } else {
                $notification = Notification::Notification('Tatuador no actualizado', 'error');
                return redirect('users/index')->with('notification', $notification);
            }
        } catch (\Exception $e) {
            DB::rollBack();
            $notification = Notification::Notification('Error', 'error');
            return redirect('users/index')->with('notification', $notification);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {


        try {

            DB::beginTransaction();
            //$userTatuador = WebDatoUsuario::where('id', $request->id)->first();
            //$user = User::where('id', $userTatuador->user_id)->first();
            //$userTatuador->delete();
            //$user->delete();

            $tatuador = WebDatoUsuario::with(['reserva' => function($reserva){
                            return $reserva->where('fecha', '>', now()->format('Y-m-d'))->get();
                        }])
                    ->with('user')
                    ->where('id', $request->id)
                    ->first();

            if($tatuador->reserva->count() === 0) {
                $tatuador->user->delete();
                $tatuador->delete();
                DB::commit();
                $notification = Notification::Notification('Tatuador eliminado', 'success');
                return redirect('users/index')->with('notification', $notification);
            }else{
                $notification = Notification::Notification('Para eliminar un tatuador verifique que no tenga turnos por atender', 'error');
                return redirect('users/index')->with('notification', $notification);
            }

        } catch (\Exception $e) {
            DB::rollBack();
            $notification = Notification::Notification('Error', 'error');
            return redirect('users/index')->with('notification', $notification);
        }
    }

    /**
     * Search the specified resource from storage.
     *
     * @param  int  $email
     * @return \Illuminate\Http\Response
     */
    public function buscarEmail(Request $request)
    {
        $user = User::where('email', $request->email)->first();

        if (is_null($user)) {
            $user = Cliente::where('email', $request->email)->first();
            if (is_null($user)) {
                $user = Tatuador::where('email', $request->email)->first();
                if (is_null($user)) {
                    return response()->json(['status' => 200]);
                }else {
                    return response()->json(['status' => 400]);
                }
            }else {
                return response()->json(['status' => 400]);
            }
        } else {
            return response()->json(['status' => 400]);
        }
    }

    /**
     * Search the specified resource from storage.
     *
     * @param  object  $user
     * @return \Illuminate\Http\Response
     */
    public function sendemail(Request $request)
    {
        $usuarioTatuador =  WebDatoUsuario::where('id', $request->userId)->first();
        $usuario = User::where('id', $usuarioTatuador->user_id)->first();
        if (!is_null($usuario)) {
            $password = $this->stringPasswordCreated();
            $usuario->password = Hash::make($password);
            $usuario->save();
            $usuario->pass = $password;
            Mail::to($usuario->email)->send(new EnviarCuentaDeUsuario($usuario, $usuarioTatuador));
        }
    }


    /* Method String Password Create
    protected function stringPasswordCreated()
    {
        $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ$#%&?*_-';
        $password =  substr(str_shuffle($permitted_chars), 0, 8);
        return $password;
    }*/

    public function updateUser($email,$token){

        $usuario = ModelsUser::where('email',$email)->where('verification_token',$token)->first();
        if(!is_null($usuario)){
            $usuario->verification_token = null;
            $usuario->verified=1;
            $usuario->save();
            if(!is_null($usuario)){
                $notification = Notification::Notification('Su correo ha sido validado', 'success');
                return redirect('/')->with('notification', $notification);
            }
        }
        $notification = Notification::Notification('Credenciales invalidas', 'error');
        return redirect('/')->with('notification', $notification);
    }

    public function restore(Request $request){
        $tatuador = Tatuador::where('id',$request->userId)->withTrashed()->first();
        $user = User::where('id',$tatuador->user_id)->withTrashed()->first();
        $result_tatuador = $tatuador->restore();
        $result_user = $user->restore();
        if(!is_null($result_tatuador) && (!is_null($result_user))){
            return [
                    'status' => 200,
                ];
        }
        return [
            'status' => 400,
        ];

    }

}
