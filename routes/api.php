<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/



Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('categorias','CategoriaController');
Route::resource('categoria_tatuajes', 'CategoriaTatuajeController');
Route::resource('clientes', 'ClienteController');
Route::resource('localidades', 'LocalidadController');
Route::resource('lugares', 'LugarController');
Route::resource('lugar_tatuajes', 'LugarTatuajeController');
Route::resource('provincias', 'ProvinciaController');
Route::resource('reservas', 'ReservaController');
Route::resource('sexos', 'SexoController');
Route::resource('sexo_tatuaje', 'SexoTatuajeController');
Route::resource('sucursales', 'SucursalController');
Route::resource('tatuadores', 'TatuadorController');
Route::resource('tatuajes', 'TatuajeController');
Route::resource('tipo_users','TipoUserController');
Route::resource('users','UserController');
Route::resource('administradores','AdministradorController');

//Route::get('tatuajes_eliminados', 'TatuajeController@trash');
//Route::get('restaurar_tatuaje/{id?}', 'TatuajeController@restore');
Route::get('tatuadores_eliminados', 'TatuadorController@trash');
Route::get('restaurar_tatuador/{id?}', 'TatuadorController@restore');
Route::get('reservas_eliminados', 'ReservaController@trash');
Route::get('restaurar_reserva/{id?}', 'ReservaController@restore');
Route::get('sucursales_eliminados', 'SucursalController@trash');
Route::get('restaurar_sucursal/{id?}', 'SucursalController@restore');
Route::get('categorias_eliminados', 'CategoriaController@trash');
Route::get('restaurar_categoria/{id?}', 'CategoriaController@restore');
Route::name('verify')->get('users/verify/{token}','UserController@verify');

Route::name('loginMobile')->post('loginMobile', 'Auth\LoginController@loginMobile');
Route::name('registerMobile')->post('registerMobile', 'Auth\RegisterController@registerMobile');
Route::name('registerMobileTatuador')->post('registerMobileTatuador', 'TatuadorController@registerMobile');
//Route::name('logout')->post('logout',)
