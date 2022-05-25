<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Models\Cliente;
use App\Models\Reserva;
use App\Models\Tatuador;
use App\Models\Tatuaje;
use App\Models\User;
use App\Models\Localidad;
use App\Helpers\Notification;

use App\Models\Sexo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;
class UserClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

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
        //
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
    public function edit()
    {
        $sexos = Sexo::all();
        $localidades = Localidad::all();
        $user = Cliente::where('user_id',Auth::user()->id)->first();
        return view('cliente.users.edit',compact('user','localidades','sexos'));
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
        $user = Cliente::where('user_id',Auth::user()->id)->first();
        $user->nombre = $request->nombre;
        $user->apellido = $request->apellido;
        $user->sexo_id = $request->selectSexo;
        // $user->dni = $request->dni;
        $user->localidad_id = $request->selectLocalidad;
        $resultado = $user->update();
        if(!is_null($resultado)){
            $notification = Notification::Notification('Usuario actualizado exitosamente', 'success');
            return redirect('/')->with('notification', $notification);
        }
        $notification = Notification::Notification('Usuario no actualizado', 'error');
        return redirect('users/create')->with('notification', $notification);
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
