<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Tatuaje;
use App\Models\Categoria;
use App\Models\CategoriaTatuaje;
use App\Models\Lugar;
use App\Models\Sexo;


use App\Http\Requests\WebTatuajeFormRequest;

use Exception;
use Auth;
use Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

use App\Helpers\Notification;


use Illuminate\Support\Facades\Auth as FacadesAuth;

class TatuajeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$tatuajes = Tatuaje::orderBy('id','DESC')->paginate(4);
        //return view('cliente.home', compact('tatuajes'));

        //$tatuajes = Tatuaje::paginate(4);
        //return view('cliente.home', compact ('tatuajes'));

        //$tatuajes = DB::table('tatuajes')->paginate(4);
        //return view('cliente.home', ['tatuajes' => $tatuajes]);

        //$tatuajes = DB::table('tatuajes')->simplePaginate(4);

        $tatuajes = Tatuaje::with('categorias')->with('sexos')->with('lugares')->get();
        $categorias = Categoria::all();

        return view('administracion.tatuaje.list', compact('tatuajes'));
    }

    public function searchTatuaje(Request $request)
    {
        $search = $request->inputSearch;

        $tatuajes = Tatuaje::with(['categorias' => function ($queryCategoria) use($search){
            $queryCategoria->where('nombre', 'LIKE', "%$search%")->get();
        }])->with(['lugares' => function ($queryLugar) use ($search){
            $queryLugar->where('nombre', 'LIKE', "%$search%")->get();
        }])->with('sexos')->get();
        $tatuajesCategorias = $tatuajes->filter(function ($tatuaje, $key) {
            return count($tatuaje->categorias) > 0 ;
        });
        $tatuajesLugares = $tatuajes->filter(function ($tatuaje, $key) {
            return count($tatuaje->lugares)>0;
        });

        return view('cliente.tatuaje.index', compact('tatuajesCategorias','tatuajesLugares','search'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorias = Categoria::all();
        $lugares = Lugar::all();
        $sexos = Sexo::all();
        return view('administracion.tatuaje.create', compact('categorias','lugares','sexos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(WebTatuajeFormRequest $request)
    {

        try {
            DB::beginTransaction();

            $tatuaje = Tatuaje::create([
                'nombre'            =>  ucwords($request->nombre),
                'fuente'            =>  $request->fuente,
                'tamaño'            =>  $request->tamaño,
                'imagen'            =>  '',
                'descripcion'       =>  $request->descripcion,
                'precio_base'       =>  $request->precio_base,
            ]);

            if ($request->file('image')) {
                $image = $request->file('image');
                $type = $image->getClientOriginalExtension();
                $img = date('Y-m-d-H-i-s') . '-id-' . $tatuaje->id . '.' . $type;
                $image->move('images/image_tatuajes/', $img);

                $avatar_image = '/images/image_tatuajes/' . $img;
            } else {
                $avatar_image = '/dist/img/user2-160x160.jpg';
            }
            $tatuaje->imagen = $avatar_image;
            $tatuaje->save();


            /*
                PIVOT Categoria Tatuaje
            */
            if (!is_null($request->selectCategoria)) {
                if (count($request->selectCategoria) > 0) {

                    for ($i = 0; $i < count($request->selectCategoria); $i++) {

                        $tatuaje->categorias()->attach($request->selectCategoria[$i]);
                    }
                }
            }


            /*
                PIVOT Sexos Tatuaje
            */
            if (!is_null($request->selectSexo)) {
                if (count($request->selectSexo) > 0) {

                    for ($i = 0; $i < count($request->selectSexo); $i++) {

                        $tatuaje->sexos()->attach($request->selectSexo[$i]);
                    }
                }
            }

            /*
                PIVOT Lugar Tatuaje
            */
            if (!is_null($request->selectLugar)) {
                if (count($request->selectLugar) > 0) {

                    for ($i = 0; $i < count($request->selectLugar); $i++) {

                        $tatuaje->lugares()->attach($request->selectLugar[$i]);
                    }
                }
            }



            if (!is_null($tatuaje)) {


                DB::commit();

                $notification = Notification::Notification('Tatuaje creado exitosamente', 'success');
                if (isset($request->save)) {
                    return redirect('tatuaje/index')->with('notification', $notification);
                }
                if (isset($request->saveAdd)) {
                    return redirect('tatuaje/create')->with('notification', $notification);
                }
            } else {

                $notification = Notification::Notification('Tatuaje no creado', 'error');
                return redirect('tatuaje/create')->with('notification', $notification);
            }
        } catch (\Exception $e) {

            DB::rollBack();
            $notification = Notification::Notification('Error', 'error');
            return redirect('tatuaje/create')->with('notification', $notification);
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
    public function edit(Tatuaje $tatuaje)
    {
        $tatuaje = Tatuaje::with('categorias')->with('sexos')->with('lugares')->where('id',$tatuaje->id)->first();
        $categorias = Categoria::all();
        $lugares = Lugar::all();
        $sexos = Sexo::all();
        return view('administracion.tatuaje.edit', compact('tatuaje', 'categorias', 'sexos','lugares'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(WebTatuajeFormRequest $request, Tatuaje $tatuaje)
    {
        try {
            DB::beginTransaction();


            if ($request->file('image')) {
                $image = $request->file('image');
                $type = $image->getClientOriginalExtension();
                $img = date('Y-m-d-H-i-s') . '-id-' . $tatuaje->id . '.' . $type;
                $image->move('images/image_tatuajes/', $img);

                $avatar_image = '/images/image_tatuajes/' . $img;
            } else {
                if(!empty($tatuaje->imagen)){
                    $avatar_image = $tatuaje->imagen;
                }else{
                    $avatar_image = '/dist/img/user2-160x160.jpg';
                }
            }

            $tatuaje->fuente    =  $request->fuente;
            $tatuaje->tamaño    =  $request->tamaño;
            $tatuaje->imagen    =  $avatar_image;
            $tatuaje->nombre    = ucwords($request->nombre);
            $tatuaje->save();

            if (!is_null($request->selectCategoria)) {
                if (count($request->selectCategoria) > 0) {
                    $tatuaje->categorias()->detach();
                    for ($i = 0; $i < count($request->selectCategoria); $i++) {
                        $tatuaje->categorias()->attach($request->selectCategoria[$i]);
                    }
                }
            }else{
                $tatuaje->categorias()->detach();
            }

            if (!is_null($request->selectSexo)) {
                if (count($request->selectSexo) > 0) {
                    $tatuaje->sexos()->detach();
                    for ($i = 0; $i < count($request->selectSexo); $i++) {
                        $tatuaje->sexos()->attach($request->selectSexo[$i]);
                    }
                }
            }else{
                $tatuaje->sexos()->detach();
            }




            if (!is_null($request->selectLugar)) {
                if (count($request->selectLugar) > 0) {
                    $tatuaje->lugares()->detach();
                    for ($i = 0; $i < count($request->selectLugar); $i++) {
                        $tatuaje->lugares()->attach($request->selectLugar[$i]);
                    }
                }
            }else{
                $tatuaje->lugares()->detach();
            }



            if (!is_null($tatuaje)) {

                DB::commit();
                $notification = Notification::Notification('El tatuaje se ha actualizado satisfactoriamente', 'success');

                return redirect('tatuaje/index')->with('notification', $notification);
            } else {
                $notification = Notification::Notification('El tatuaje no se ha actualizado', 'error');
                return redirect('tatuaje/index')->with('notification', $notification);
            }
        } catch (\Exception $e) {

            DB::rollBack();
            $notification = Notification::Notification('Error', 'error');
            return redirect('tatuaje/index')->with('notification', $notification);
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
            $tatuaje = Tatuaje::where('id', $request->id)->first();
            $tatuaje->categorias()->detach();
            $tatuaje->delete();
            if ($tatuaje) {
                DB::commit();
                $notification = Notification::Notification('El tatuaje fue eliminado con éxito', 'success');
                return redirect('tatuaje/index')->with('notification', $notification);
            } else {
                $notification = Notification::Notification('El tatuaje no fue sido eliminado', 'error');
                return redirect('tatuaje/index')->with('notification', $notification);
            }
        } catch (\Exception $e) {
            DB::rollBack();
            $notification = Notification::Notification('Error', 'error');
            return redirect('tatuaje/index')->with('notification', $notification);
        }
    }
}
