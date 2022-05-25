<?php

namespace App\Http\Controllers;

use App\Models\Lugar;
use App\Http\Requests\LugarRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;


class LugarController extends ApiController
{
	public function index()
    {
        $lugares = Lugar::all();
        return $this->showAll($lugares);
    }

    public function store(LugarRequest $request)
    {
    	$campos = $request->all();
        $lugares = Lugar::create($campos);
        return $this->showOne($lugares, 201);
    }


    public function show($id)
    {
        $lugar = Lugar::where('id', '=', $id)->firstOrFail();
        return $this->showOne($lugar);
    }


    public function edit($id)
    {
        $lugar = Lugar::findOrFail($id);
        return response()->json(
        $lugar->toArray());
    }

   public function update(Request $request, Lugar $lugar)
    {
        $rules = [
            'nombre' => 'string|max:10',
        ];

        $this->validate($request, $rules);

        $lugar->fill($request->only([
            'nombre',
        ]));

        if($lugar->isClean()) {
            return $this->errorResponse('Debe especificarse al menos un valor distinto para continuar con la actualizacion', 422);
        }

        $lugar->save();


        return $this->showOne($lugar, 201);

    }



    public function destroy(Lugar $lugar)
    {
        $lugar->delete();

        return $this->showOne($lugar, 200);
    }
}
