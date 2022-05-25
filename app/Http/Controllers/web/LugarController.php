<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests\WebLugarFormRequest;
use App\Models\Lugar;

use Exception;
use Auth;
use Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

use App\Helpers\Notification;
use Illuminate\Support\Facades\Auth as FacadesAuth;

class LugarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lugares = Lugar::all();
        return view('administracion.lugar.list', compact('lugares'));
    }

    public function restoreList(){
         //onlyTrashed trae solo los eliminados
        $lugares=Lugar::onlyTrashed()->get();
        return view('administracion.lugar.list_restore', compact('lugares'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('administracion.lugar.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(WebLugarFormRequest $request)
    {
        try {
            DB::beginTransaction();

            $lugar = Lugar::create([
                'nombre'           =>  ucwords($request->nombre),
            ]);



            if (!is_null($lugar)) {


                DB::commit();

                $notification = Notification::Notification('Lugar creado exitosamente', 'success');
                if (isset($request->save)) {
                    return redirect('lugar/index')->with('notification', $notification);
                }
                if (isset($request->saveAdd)) {
                    return redirect('lugar/create')->with('notification', $notification);
                }
            } else {

                $notification = Notification::Notification('Lugar no creado', 'error');
                return redirect('lugar/create')->with('notification', $notification);
            }
        } catch (\Exception $e) {

            DB::rollBack();
            $notification = Notification::Notification('Error', 'error');
            return redirect('lugar/create')->with('notification', $notification);
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
    public function edit(Lugar $lugar)
    {
        return view('administracion.lugar.edit', compact('lugar'));
    }

    public function restore(Request $request){
        $lugar = Lugar::where('id',$request->lugarId)->withTrashed()->first();
        $result_lugar = $lugar->restore();
        if(!is_null($result_lugar)){
            return [
                    'status' => 200,
                ];
        }
        return [
            'status' => 400,
        ];

    }

    public function activar(Request $request){
        $lugar = Lugar::where('id',$request->idLugar)->first();
        if(!is_null($lugar)){
            $result = $lugar->save();
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

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(WebLugarFormRequest $request, Lugar $lugar)
    {
        try {
            DB::beginTransaction();

            $lugar->nombre         = ucwords($request->nombre);
            $lugar->save();
        


            if (!is_null($lugar)) {

                DB::commit();
                $notification = Notification::Notification('El lugar se ha actualizado satisfactoriamente', 'success');

                return redirect('lugar/index')->with('notification', $notification);
            } else {
                $notification = Notification::Notification('El lugar no ha sido actualizado', 'error');
                return redirect('lugar/index')->with('notification', $notification);
            }
        } catch (\Exception $e) {
            DB::rollBack();
            $notification = Notification::Notification('Error', 'error');
            return redirect('lugar/index')->with('notification', $notification);
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
            $lugar = Lugar::where('id', $request->id)->first();
            $lugar->delete();
            if ($lugar) {
                DB::commit();
                $notification = Notification::Notification('El lugar se ha eliminado', 'success');
                return redirect('lugar/index')->with('notification', $notification);
            } else {
                $notification = Notification::Notification('El lugar no ha sido eliminado', 'error');
                return redirect('lugar/index')->with('notification', $notification);
            }
        } catch (\Exception $e) {
            DB::rollBack();
            $notification = Notification::Notification('Error', 'error');
            return redirect('lugar/index')->with('notification', $notification);
        }
    }
}
