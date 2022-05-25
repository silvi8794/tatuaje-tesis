<?php

namespace App\Http\Controllers\web;

use App\Helpers\Notification;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Reserva;
use App\Models\Cliente;
use App\Models\Tatuador;
use App\Models\Tatuaje;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;


use Illuminate\Support\Facades\Mail;
use App\Mail\WelcomeMail;
use App\Mail\turnoCancelado;


class TurnosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $date = date($request->dateFormat.' '.$request->turno);

        $cliente = Cliente::where('user_id', '=', Auth::user()->id)->firstOrFail();
        $tatuador = Tatuador::where('id', '=', $request->idTatuador)->firstOrFail();
        $tatuaje = Tatuaje::where('id', '=', $request->idImagen)->firstOrFail();

        $codigo_de_seguridad = bcrypt($cliente->nombre . '-' . $tatuador->nombre . '-' . $tatuaje->id);

        $reserva = new Reserva();

        $reserva->fecha = $date;
        $reserva->cliente_id = $cliente->id;
        $reserva->tatuador_id = $tatuador->id;
        $reserva->tatuaje_id = $tatuaje->id;
        $reserva->codigo_de_seguridad = $codigo_de_seguridad;
        $reserva->estado = false;
        $result = $reserva->save();

        if(!is_null($result)){
            return [
                'status'    =>  200,
            ];
        }
        return [
            'status'    =>  400,
        ];


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
    public function destroy(Request $request)
    {
        try {
            DB::beginTransaction();
            $reserva = Reserva::with("cliente")->where('id', $request->id)->first();

            $cliente= $reserva->cliente;

            if ($reserva->delete()) {
                DB::commit();

                Mail::to($cliente->email)->queue(new turnoCancelado($cliente));

                $notification = Notification::Notification('El turno ha sido eliminado con éxito', 'success');
                return redirect('tatuador/index')->with('notification', $notification);
            } else {
                $notification = Notification::Notification('El turno no ha sido eliminado', 'error');
                return redirect('tatuador/index')->with('notification', $notification);
            }
        } catch (\Exception $e) {
            //DB::rollBack();
            $notification = Notification::Notification('Error', 'error');
            return redirect('tatuador/index')->with('notification', $notification);
        }
    }
    public function buscarTurno(){
        $cliente = Cliente::where('user_id',Auth::user()->id)->first();
        $turnosAsignados = Reserva::where('cliente_id',$cliente->id)->with(['tatuador' => function($query){
            $query->with('sucursal')->get();
        }])->with('tatuaje')->whereDate('fecha', '>=', Carbon::today()->toDateString())->where('estado',false)->orderBy('fecha','asc')->get();
        return view('cliente.turno.listado_turnos',compact('turnosAsignados'));

    }

    public function turno(){
        $tatuadores = Tatuador::with(['sucursal' => function ($querySucursal){
            $querySucursal->with('localidad')->get();
        }])->get();
        $tatuajes = Tatuaje::with('categorias')->with('sexos')->with('lugares')->get();
        $cliente = Cliente::where('user_id',Auth::user()->id)->first();
        $turnosAsignados = Reserva::where('cliente_id',$cliente->id)->with(['tatuador' => function($query){
            $query->with('sucursal')->get();
        }])->with('tatuaje')->whereDate('fecha', '>=', Carbon::today()->toDateString())->get();
        return view('cliente.turno.create',compact('tatuadores','tatuajes','turnosAsignados'));
    }

    public function eliminarTurno($id){
        $reserva = Reserva::where('id',$id)->first();
        if(!is_null($reserva)){
            $resultado = $reserva->delete();
            if(!is_null($resultado)){
                return [
                    'status' => 200,
                ];
            }
        }
        return [
            'status' => 400,
        ];
    }
}
