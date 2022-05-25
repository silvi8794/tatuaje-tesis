<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reserva;
use App\Models\Cliente;
use App\Models\Tatuador;
use App\Models\Tatuaje;
use App\Http\Requests\ReservaRequest;
use App\Http\Controllers\ApiController;



class ReservaController extends ApiController
{
    public function index()
    {
        $reserva = Reserva::with('cliente','tatuador','tatuaje')->get();
        return $this->showAll ($reserva);
    }

     public function store(ReservaRequest $request)
    {
        //$campos = $request->all();
        //$reserva = Reserva::create($campos);

        $cliente = Cliente::where('id', '=', $request->cliente_id)->firstOrFail();
        $tatuador = Tatuador::where('id', '=', $request->tatuador_id)->firstOrFail();
        $tatuaje = Tatuaje::where('id', '=', $request->tatuaje_id)->firstOrFail();

        $codigo_de_seguridad = bcrypt($cliente->nombre . '-' . $tatuador->nombre . '-' . $tatuaje->id);

        $reserva = new Reserva();

        //$reserva->fecha = $request->fecha;
        $reserva->cliente_id = $request->cliente_id;
        $reserva->tatuador_id = $request->tatuador_id;
        $reserva->tatuaje_id = $request->tatuaje_id;


        /*if ($cliente->id == $tatuador->id )
        {    
            return $this-> errorResponse('El cliente debe ser distinto al tatuador',409);
        }*/

        //USER
        /*if (!$cliente->esVerificado())
        {    
            return $this-> errorResponse('El cliente debe ser un usuario verificado',409);
        }
        if (!$tatuador->esVerificado())
        {    
            return $this-> errorResponse('El tatuador debe ser un usuario verificado',409);
        }*/

        //esta opcion puede ser para que seleccione un tatuaje similar al que quiere realizarse
        
        /*if (!$tatuador->estaActivado())
        {    
            return $this-> errorResponse('El tatuador para esta reserva debe estar activado',409);
        };*/

        $reserva->codigo_de_seguridad = $codigo_de_seguridad;

        $reserva->save();

        return $this->showOne($reserva, 201);
        
    }



    public function show($id)
    {
        $reserva = Reserva::where('id', '=', $id)->firstOrFail();
        return $this->showOne($reserva);
    }
    
        

   public function update(Request $request, Reserva $reserva)
    {    
        $reserva = Reserva::findOrFail($id);
        $reglas = [
            'cliente_id'=>'min:1',
            'tatuador_id'=>'min:1',
            'tatuaje_id'=>'min:1',
            
        ];

        $this->validate($request, $reglas);


        if($request->has('cliente_id')) {
            $reserva->cliente_id = $request->cliente_id;
        }

        if($request->has('tatuador_id')) {
            $reserva->tatuador_id = $request->tatuador_id;
        }

        if($request->has('tatuaje_id')) {
            $reserva->tatuaje_id = $request->tatuaje_id;
        }

         $reserva->save();

        return $this->showOne($reserva, 201);

        
    }

    public function trash()
    {
        //onlyTrashed trae solo los eliminados
        $reserva=Reserva::onlyTrashed()->get();

        //return view('usuarios.listadoTrash',compact('usuarios'));
        return $this->showAll($reserva);
    }
        
        
    
    public function restore($id)
    {
        $reserva = Reserva::withTrashed()->where('id', '=', $id)->firstOrFail();
        $reserva->restore();
        //return redirect('tatuadores');

        return $this->showOne($reserva);

    }

    public function destroy($id){
        
        $reserva = Reserva::where('id', '=', $id)->firstOrFail();

        $reserva->delete();

        return $this->showOne($reserva, 201);
    }
}
