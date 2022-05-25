<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Models\Sucursal;
use App\Models\Localidad;
use Illuminate\Http\Request;

use Exception;
use Auth;
use Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

use App\Helpers\Notification;
use Illuminate\Support\Facades\Auth as FacadesAuth;

use App\Http\Requests\WebSucursalFormRequest;

class SucursalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sucursales = Sucursal::all();
        return view('administracion.sucursal.list', compact('sucursales'));
    }

    public function restoreList(){
         //onlyTrashed trae solo los eliminados
        $sucursales=Sucursal::onlyTrashed()->get();
        return view('administracion.sucursal.list_restore', compact('sucursales'));
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $localidades = Localidad::all();
        return view('administracion.sucursal.create', compact('localidades'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(WebSucursalFormRequest $request)
    {
        try {
            DB::beginTransaction();

            $sucursal = Sucursal::create([
                'nombre'           =>  $request->nombre,
                'direccion'        =>  $request->direccion,
                'horario_inicio'   =>  $request->horario_inicio,
                'horario_fin'      =>  $request->horario_fin,
                'localidad_id'     =>  $request->selectLocalidad,
            ]);



            if (!is_null($sucursal)) {


                DB::commit();

                $notification = Notification::Notification('Sucursal creado exitosamente', 'success');
                if (isset($request->save)) {
                    return redirect('sucursal/index')->with('notification', $notification);
                }
                if (isset($request->saveAdd)) {
                    return redirect('sucursal/create')->with('notification', $notification);
                }
            } else {

                $notification = Notification::Notification('Sucursal no creada', 'error');
                return redirect('sucursal/create')->with('notification', $notification);
            }
        } catch (\Exception $e) {

            DB::rollBack();
            $notification = Notification::Notification('Error', 'error');
            return redirect('sucursal/create')->with('notification', $notification);
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
    public function edit(Sucursal $sucursal)
    {
        $localidades = Localidad::all();
        return view('administracion.sucursal.edit', compact('sucursal', 'localidades'));
    }

    

    
   /* public function restore($id)
    {
        $sucursal = sucursal::withTrashed()->where('id', '=', $id)->firstOrFail();
        $sucursal->restore();
        //return redirect('tatuadores');

        return $this->showOne($sucursal);

    }*/


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(WebSucursalFormRequest $request, Sucursal $sucursal)
    {

        try {
            DB::beginTransaction();

            $sucursal->nombre         = $request->nombre;
            $sucursal->direccion      = $request->direccion;
            $sucursal->horario_inicio = $request->horario_inicio;
            $sucursal->horario_fin    = $request->horario_fin;
            $sucursal->localidad_id   = $request->selectLocalidad;
            $sucursal->save();



            if (!is_null($sucursal)) {

                DB::commit();
                $notification = Notification::Notification('La sucursal se ha actualizado satisfactoriamente', 'success');

                return redirect('sucursal/index')->with('notification', $notification);
            } else {
                $notification = Notification::Notification('La sucursal no ha sido actualizada', 'error');
                return redirect('sucursal/index')->with('notification', $notification);
            }
        } catch (\Exception $e) {
            DB::rollBack();
            $notification = Notification::Notification('Error', 'error');
            return redirect('sucursal/index')->with('notification', $notification);
        }
    }

    public function restore(Request $request){
        $sucursal = Sucursal::where('id',$request->sucursalId)->withTrashed()->first();
        $result_sucursal = $sucursal->restore();
        if(!is_null($result_sucursal)){
            return [
                    'status' => 200,
                ];
        }
        return [
            'status' => 400,
        ];

    }

    public function activar(Request $request){
        $sucursal = Sucursal::where('id',$request->idSucursal)->first();
        if(!is_null($sucursal)){
            //$sucursal->estado = true;
            $result = $sucursal->save();
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
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        try {

            DB::beginTransaction();
            $sucursal = Sucursal::where('id', $request->id)->first();
            $sucursal->delete();
            if ($sucursal) {
                DB::commit();
                $notification = Notification::Notification('La sucursal ha sido eliminada con exito', 'success');
                return redirect('sucursal/index')->with('notification', $notification);
            } else {
                $notification = Notification::Notification('La sucursal no ha sido eliminada', 'error');
                return redirect('sucursal/index')->with('notification', $notification);
            }
        } catch (\Exception $e) {
            DB::rollBack();
            $notification = Notification::Notification('Error', 'error');
            return redirect('sucursal/index')->with('notification', $notification);
        }
    }
}
