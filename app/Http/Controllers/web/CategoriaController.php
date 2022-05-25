<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Categoria;

use App\Http\Requests\WebCategoriaFormRequest;

use Exception;
use Auth;
use Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

use App\Helpers\Notification;
use Illuminate\Support\Facades\Auth as FacadesAuth;



class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categorias = Categoria::all();
        return view('administracion.categoria.list', compact('categorias'));
    }

    public function restoreList(){
         //onlyTrashed trae solo los eliminados
        $categorias=Categoria::onlyTrashed()->get();
        return view('administracion.categoria.list_restore', compact('categorias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('administracion.categoria.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(WebCategoriaFormRequest $request)
    {
        try {
            DB::beginTransaction();

            $categoria = Categoria::create([
                'nombre'           =>  ucwords($request->nombre),
            ]);



            if (!is_null($categoria)) {


                DB::commit();

                $notification = Notification::Notification('Categoria creada exitosamente', 'success');
                if (isset($request->save)) {
                    return redirect('categoria/index')->with('notification', $notification);
                }
                if (isset($request->saveAdd)) {
                    return redirect('categoria/create')->with('notification', $notification);
                }
            } else {

                $notification = Notification::Notification('Categoria no creada', 'error');
                return redirect('categoria/create')->with('notification', $notification);
            }
        } catch (\Exception $e) {

            DB::rollBack();
            $notification = Notification::Notification('Error', 'error');
            return redirect('categoria/create')->with('notification', $notification);
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
    public function edit(Categoria $categoria)
    {
        return view('administracion.categoria.edit',compact('categoria'));
    }


    public function restore(Request $request){
        $categoria = Categoria::where('id',$request->categoriaId)->withTrashed()->first();
        $result_categoria = $categoria->restore();
        if(!is_null($result_categoria)){
            return [
                    'status' => 200,
                ];
        }
        return [
            'status' => 400,
        ];

    }

    public function activar(Request $request){
        $categoria = Categoria::where('id',$request->idCategoria)->first();
        if(!is_null($categoria)){
            $result = $categoria->save();
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
    public function update(WebCategoriaFormRequest $request, Categoria $categoria)
    {
        try {
            DB::beginTransaction();

            $categoria->nombre         = ucwords($request->nombre);
            $categoria->save();



            if (!is_null($categoria)) {

                DB::commit();
                $notification = Notification::Notification('La categoria se ha actualizado satisfactoriamente', 'success');

                return redirect('categoria/index')->with('notification', $notification);
            } else {
                $notification = Notification::Notification('La categoria no se ha actualizado', 'error');
                return redirect('categoria/index')->with('notification', $notification);
            }
        } catch (\Exception $e) {
            DB::rollBack();
            $notification = Notification::Notification('Error', 'error');
            return redirect('categoria/index')->with('notification', $notification);
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
            $categoria = Categoria::where('id', $request->id)->first();
            $categoria->delete();
            if ($categoria) {
                DB::commit();
                $notification = Notification::Notification('La categoria ha sido eliminada', 'success');
                return redirect('categoria/index')->with('notification', $notification);
            } else {
                $notification = Notification::Notification('La categoria no ha sido eliminada', 'error');
                return redirect('categoria/index')->with('notification', $notification);
            }
        } catch (\Exception $e) {
            DB::rollBack();
            $notification = Notification::Notification('Error', 'error');
            return redirect('categoria/index')->with('notification', $notification);
        }
    }
}
