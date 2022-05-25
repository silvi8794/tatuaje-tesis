<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Localidad;
use App\Models\Sexo;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Session as FacadesSession;
use Session;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';



    public function showLoginForm(){
        $sexos = Sexo::all();
        $localidades = Localidad::all();
        return view('/auth/login',compact('sexos','localidades'));
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    /**
     * Where to redirect users after login.
     *
     * Override Login
     */
    public function login(Request $request)
    {

        $credentials= $this->validate(request(),[
            $this->username()=> 'required|string',
                                'password'=>'required|string'
        ]);

/*         $credentials = $this->credentials($request); */
            //probar para tatuadores tipouser == 2

        if (Auth::validate($credentials)) {
            $user = Auth::getLastAttempted();
            
               if($user->verified && is_null($user->verification_token)){
                   auth()->login($user);
                   return redirect()->to('home');
                   
               }else{
                Session::flash('message', 'Debe activar su cuenta desde su correo por favor');
                return back()->withInput()->withErrors(['message'=>'Debe activar su cuenta desde su correo por favor']);
                }
            
        } else {
            Session::flash('flash_message', 'Esta cuenta no existe');
            Session::flash('flash_message_class', 'danger');
            Session::flash('message', 'El email o la contraseña son incorrectos');
            return back()->withErrors(['message'=>'El email o la contraseña son incorrectos'])
                 ->withInput(request([$this->username()]));

        }
    }
}
