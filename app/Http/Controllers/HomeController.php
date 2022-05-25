<?php

namespace App\Http\Controllers;

use App\Models\Tatuador;
use Illuminate\Http\Request;
use Auth;

use App\Models\Tatuaje;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(Auth::user()->tipouser_id===3){
            /*$tatuajes = Tatuaje::with('categorias')->with('sexos')->with('lugares')->inRandomOrder()->take(4)->get();*/
            $tatuajes = Tatuaje::with('categorias')->with('lugares')
            ->orderBy('id','desc') //del mas nuevo al mas antiguo
            ->paginate(4);

            return view('cliente.home', compact('tatuajes'));
        }
        $dataUser = Tatuador::where('user_id',Auth::user()->id)->first();
        if(is_null($dataUser)){
            session(['dataUser' => null]);
        }else{
            session(['dataUser' => $dataUser]);
            return redirect('/tatuador/index');
        }

        //return view('administracion.home');
        return redirect('/tatuaje/index');

    }
}
