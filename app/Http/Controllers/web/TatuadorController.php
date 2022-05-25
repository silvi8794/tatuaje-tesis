<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Models\Reserva;
use App\Models\Tatuador;
use App\Models\WebDatoUsuario;
use App\Models\Sucursal;
use App\Models\Sexo;
use App\Models\Localidad;

use Illuminate\Support\Facades\DB;
use App\Helpers\Notification;


use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;


class TatuadorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tatuador = Tatuador::where('user_id', '=', Auth::user()->id)->first();
        $turnos = Reserva::where('tatuador_id',$tatuador->id)->where('estado',0)->with('cliente','tatuaje')->orderBy('fecha','asc')->get();
        return view('administracion.tatuador.list', compact('turnos'));
    }

    public function turnosAtendidos()
    {
        $tatuador = Tatuador::where('user_id', '=', Auth::user()->id)->first();
        $turnos = Reserva::where('tatuador_id',$tatuador->id)->where('estado',1)->with('cliente','tatuaje')->orderBy('fecha','asc')->get();
        return view('administracion.tatuador.turnosAtendidos', compact('turnos'));
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

        $user = WebDatoUsuario::with('sexo')->with('localidad')->with('sucursal')->where('user_id', Auth::user()->id)->first();
        $sucursales = Sucursal::all();
        $sexos = Sexo::all();
        $localidades = Localidad::all();
        return view('administracion.users.edit_tatuador', compact('user', 'sucursales', 'sexos', 'localidades'));
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
                $notification = Notification::Notification('Su perfil se actualizo satisfactoriamente', 'success');

                return redirect('/tatuador/edit')->with('notification', $notification);
            } else {
                $notification = Notification::Notification('Su perfil no se actualizo', 'error');
                return redirect('/tatuador/edit')->with('notification', $notification);
            }
        } catch (\Exception $e) {
            DB::rollBack();
            $notification = Notification::Notification('Error', 'error');
            return redirect('/tatuador/edit')->with('notification', $notification);
        }
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

    public function calendario(Request $request){
        $now = Carbon::now();
        $fechas = Reserva::where('tatuador_id',$request->idTatuador)->where('fecha','>=',$now->format('Y-m-d'))->get();

        $data = [];
        if(!is_null($fechas)){
            foreach ($fechas as $fecha) {
                $date = new Carbon($fecha->fecha);
                $data[] = array(
                    'id'    => $fecha->id,
                    'turno' => $date->format('H:i:s'),
                    'title' => 'Turno '. $date->format('H:i').'-'.$date->modify('+120 minute')->format('H:i'),
                    'start' => $date->format('Y-m-d'),
                    'end' => $date->format('Y-m-d')
                );
            }
            return [
                'status'    =>  200,
                'dataCalendar'      =>  $data
            ];
        }
        return [
            'status'    =>  400,
            'dataCalendar'      =>  $data
        ];

    }

    public function atender(Request $request){
        $reserva = Reserva::where('id',$request->idTurno)->first();
        if(!is_null($reserva)){
            $reserva->estado = true;
            $result = $reserva->save();
            if(!is_null($result)){
                return [
                    'status' => 200
                ];
            }
        }
        return [
            'status' => 400
        ];
    }


}
