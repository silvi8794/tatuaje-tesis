<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Tatuaje;
use App\Models\Sexo;
use App\Models\Localidad;

use Illuminate\Support\Facades\Mail;
use App\Mail\WelcomeMail;
use App\Mail\msjContacto;

use App\Helpers\Notification;
use Illuminate\Support\Facades\Auth as FacadesAuth;


class WelcomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tatuajes = Tatuaje::with('categorias')->with('sexos')->with('lugares')
        ->orderBy('id','desc') //del mas nuevo al mas antiguo
        ->paginate(4);
        //->simplePaginate(8);

        $sexos = Sexo::all();
        $localidades = Localidad::all();
        return view('welcome', compact('tatuajes','sexos','localidades'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $mensaje = request()->validate([
            'nombre'=>'required|min:3|max:30',
            'email'=>'required|email|min:3|max:40',
            'motivo'=>'required|min:5|max:80',
            'mensaje'=>'required|min:8|max:1000',

        ]);


        Mail::to('viccfantasma@gmail.com')->queue(new msjContacto($mensaje));
        $notification = Notification::Notification('Mensaje enviado correctamente, te responderemos a la brevedad', 'success');
        return redirect('/')->with('notification', $notification);

        //return 'Mensaje Enviado'; return back();
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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
