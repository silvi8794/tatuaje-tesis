<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;

use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

use App\Models\TipoUser;
use App\Models\Cliente;
use App\Models\Localidad;
use App\Models\Sexo;

use App\Helpers\Notification;

use App\Http\Requests\RegisterFormRequest;
use App\Mail\EnviarCuentaDeCliente;
use App\Mail\EnviarCuentaDeUsuario;
use App\Models\User as ModelsUser;
use Facade\FlareClient\Http\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
    PROBAR Y EN LOGIN TAMBIEN
    protected $redirectTo = '/';
    */

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }

    public function register(RegisterFormRequest $request)
    {
        try {
            DB::beginTransaction();

            $userExist = User::where('email', $request->email)->first();
            $dniClient = Cliente::where('dni',$request->dni)->orWhere('email', $request->email)->first();



            if (is_null($userExist) && is_null($dniClient)) {


                $tipoUsuario = TipoUser::where('nombre', 'cliente')->first();

                $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
                $verified_token =  substr(str_shuffle($permitted_chars), 0, 30);
                $user = User::create([
                    'email'                 =>  $request->email,
                    'password'              =>  Hash::make($request->password),
                    'admin'                 =>  '-',
                    'tipouser_id'           =>  $tipoUsuario->id,
                    'verification_token'    =>  $verified_token,
                ]);

                if(!is_null($tipoUsuario) && $tipoUsuario->id===3){
                    $cliente = new Cliente();
                    $cliente->dni = $request->dni;
                    $cliente->nombre = $request->nombre;
                    $cliente->apellido = $request->apellido;
                    $cliente->email = $user->email;
                    $cliente->localidad_id = $request->selectLocalidad;
                    $cliente->user_id = $user->id;
                    $cliente->sexo_id = $request->selectSexo;
                    $cliente->save();
                }
                if (!is_null($user)) {
                    Mail::to($user->email)->send(new EnviarCuentaDeCliente($user, $cliente, $request->password));
                    DB::commit();
                    $notification = Notification::Notification('Usuario creado exitosamente verifique su correo por favor', 'success');
                    return redirect('/')->with('notification', $notification);
                } else {
                    $notification = Notification::Notification('Usuario no creado', 'error');
                    return redirect('/')->with('notification', $notification);
                }
            } else {
                $notification = Notification::Notification('El email o DNI ya existe', 'error');
                return redirect('/')->with('notification', $notification);
            }


        } catch (\Exception $e) {
            DB::rollBack();
            $notification = Notification::Notification('Error en el envio del email', 'error');
            return redirect('/')->with('notification', $notification);
        }

    }
    public function updateVerified($email,$token){

        $user = ModelsUser::where('email',$email)->where('verification_token',$token)->first();
        if(!is_null($user)){
            $user->verification_token = null;
            $user->verified=1;
            $user->save();
            if(!is_null($user)){
                $notification = Notification::Notification('Su correo ha sido validado. Por favor inicie sesión', 'success');
                return redirect('/')->with('notification', $notification);
            }
        }
        $notification = Notification::Notification('Credenciales invalidas', 'error');
        return redirect('/')->with('notification', $notification);
    }

    public function registerMobile(RegisterFormRequest $request)
    {
        $userExist = ModelsUser::where('email', $request->email)->first();
        $dniClient = Cliente::where('dni',$request->dni)->orWhere('email', $request->email)->first();

        if ($userExist == null && $dniClient == null)
        {
            $tipoUsuario = TipoUser::where('nombre', 'cliente')->first();

            $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $verified_token =  substr(str_shuffle($permitted_chars), 0, 30);

            $newUser = ModelsUser::create([
                    'email'=>$request->email,
                    'password'=>Hash::make($request->password),
                    'admin'=>'-',
                    'tipouser_id'=>$tipoUsuario->id,
                    'verification_token'    =>  $verified_token,
            ]);


        }
        $usuario = ModelsUser::where('email', $request->email)->first();

        $newClient = Cliente::create([
            'dni'=>$request->dni,
            'nombre'=>$request->nombre,
            'apellido'=>$request->apellido,
            'email'=>$request->email,
            'localidad_id'=>$request->localidad_id,
            'user_id'=>$usuario->id,
            'sexo_id'=>$request->sexo_id

        ]);

        Mail::to($newUser->email)->send(new EnviarCuentaDeCliente($newUser, $newClient, $request->password));
        return response()->json([$newUser, $newClient]) ;

    }
}
