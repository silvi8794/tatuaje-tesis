<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', 'web\WelcomeController@index');
/* Route::get('/', function () {
    return view('welcome');
}); */

Auth::routes();





Route::get('/home', 'HomeController@index')->name('home')->middleware('administracion');
Route::get('/home', 'HomeController@index')->name('home')->middleware('cliente');

/* Route::get('/home_cliente', 'HomeController@homeCliente')->name('home_cliente')->middleware(''); */
Route::get('/register', 'Auth\LoginController@login');
Route::get('/login/{email}/{token}', 'Auth\RegisterController@updateVerified');
Route::post('/register', 'Auth\RegisterController@register')->name('register');



//Password Reset
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
//Route::post('password/reset', 'Auth\ResetPasswordController@reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');

//Contacto ----> URL, CARPETA
//Route::get('/contacto', 'WelcomeController@index');
Route::post('/contacto', 'web\WelcomeController@store');




/* GET|HEAD   home                                            | home                       | App\Http\Controllers\HomeController@index                              | web,auth     |
POST       login                                           |                            | App\Http\Controllers\Auth\LoginController@login                        | web,guest    |
GET|HEAD   login                                           | login                      | App\Http\Controllers\Auth\LoginController@showLoginForm                | web,guest    |
POST       logout                                          | logout                     | App\Http\Controllers\Auth\LoginController@logout                       | web

GET|HEAD   password/confirm                                | password.confirm           | App\Http\Controllers\Auth\ConfirmPasswordController@showConfirmForm    | web,auth     |
POST       password/confirm                                |                            | App\Http\Controllers\Auth\ConfirmPasswordController@confirm            | web,auth     |
POST       password/email                                  | password.email             | App\Http\Controllers\Auth\ForgotPasswordController@sendResetLinkEmail  | web

GET|HEAD   password/reset                                  | password.request           | App\Http\Controllers\Auth\ForgotPasswordController@showLinkRequestForm | web

POST       password/reset                                  | password.update            | App\Http\Controllers\Auth\ResetPasswordController@reset                | web

GET|HEAD   password/reset/{token}                          | password.reset             | App\Http\Controllers\Auth\ResetPasswordController@showResetForm        | web

GET|HEAD   register                                        | register                   | App\Http\Controllers\Auth\RegisterController@showRegistrationForm      | web,guest    |
POST       register                                        |                            | App\Http\Controllers\Auth\RegisterController@register                  | web,guest  */


/*
Route::group([
    'middleware'    =>  'cliente',
    'prefix' => 'users'
], function () {
    return view('cliente.home');
}); */




/*
  Ususario Routes
*/

  //PERFIL ADMINISTRADOR TATUADOR

Route::group([
    'middleware'    =>  'auth',
    'prefix' => 'users'
], function () {
    Route::get('/login/{email}/{token}', 'web\UserController@updateUser');
    Route::post('store', 'web\UserController@store')->name('users.store');
    Route::get('index', 'web\UserController@index')->name('users.index');
    Route::get('create', 'web\UserController@create')->name('users.create');
    Route::put('{user}/update', 'web\UserController@update')->name('users.update');
    Route::get('{user}/edit', 'web\UserController@edit')->name('users.edit');
    Route::delete('/delete', 'web\UserController@destroy')->name('users.delete');
    Route::post('buscar/provincia', 'web\ProvinciaController@buscarProvincia')->name('users.buscarProvincia');
    Route::post('buscar/email', 'web\UserController@buscarEmail')->name('users.buscarEmail');
    Route::post('search/username', 'web\UserController@searchUsername')->name('users.searchUsername');
    Route::post('sendemail', 'web\UserController@sendemail')->name('users.sendemail');
    Route::get('restoreList', 'web\UserController@restoreList')->name('users.restoreList');
    Route::post('restore', 'web\UserController@restore')->name('users.restore');



    //PERFIL ADMINISTRADOR ADMIN
});
Route::group([
    'middleware'    =>  'auth',
    'prefix' => 'admin'
], function () {
    Route::get('/login/{email}/{token}', 'web\UserAdminController@updateUser');
    Route::post('store', 'web\UserAdminController@store')->name('admin.store');
    Route::get('index', 'web\UserAdminController@index')->name('admin.index');
    Route::get('create', 'web\UserAdminController@create')->name('admin.create');
    Route::put('{user}/update', 'web\UserAdminController@update')->name('admin.update');
    Route::get('{user}/edit', 'web\UserAdminController@edit')->name('admin.edit');
    Route::delete('/delete', 'web\UserAdminController@destroy')->name('admin.delete');
    Route::post('buscar/provincia', 'web\ProvinciaController@buscarProvincia')->name('admin.buscarProvincia');
    Route::post('buscar/email', 'web\UserAdminController@buscarEmail')->name('admin.buscarEmail');
    Route::post('search/username', 'web\UserAdminController@searchUsername')->name('admin.searchUsername');
    Route::post('sendemail', 'web\UserAdminController@sendemail')->name('admin.sendemail');
    Route::get('restoreList', 'web\UserAdminController@restoreList')->name('admin.restoreList');
    Route::post('restore', 'web\UserAdminController@restore')->name('admin.restore');


//PERFIL TATUADOR

});
Route::group([
    'middleware'    =>  'auth',
    'prefix' => 'tatuador'
], function () {
    Route::get('calendario', 'web\TatuadorController@calendario')->name('tatuador.calendario');
    Route::get('index', 'web\TatuadorController@index')->name('tatuador.index');
    Route::get('turnosAtendidos', 'web\TatuadorController@turnosAtendidos')->name('tatuador.turnosAtendidos');
    Route::post('atender', 'web\TatuadorController@atender')->name('tatuador.atender');
    Route::get('edit', 'web\TatuadorController@edit')->name('tatuador.edit');
    Route::put('{user}/update', 'web\TatuadorController@update')->name('tatuador.update');

});


//PERFIL CLIENTE

/* Usuario Cliente Routes */

Route::group([
    'middleware'    =>  'auth',
    'prefix' => 'users_cli'
], function () {
    Route::get('editar', 'web\UserClienteController@edit')->name('users_cli.editar')->middleware('cliente');
    Route::put('{user}/updateuser', 'web\UserClienteController@update')->name('users_cli.update')->middleware('cliente');
});

/*Agregado para notificacion de turnos cancelados*/

use App\User;
//Route::get('/notificacion', function(){
  //  $users = User::find(3);
    //$users->notify(new \App\Notifications\turnoCancelado);

  //  return "Notificacion enviada";
//});



Route::group([
    'middleware'    =>  'auth',
    'prefix' => 'turnos'
], function () {
    Route::post('store', 'web\TurnosController@store')->name('turnos.store')->middleware('cliente');
    Route::get('turno', 'web\TurnosController@turno')->name('users_cli.turno')->middleware('cliente');
    Route::get('buscar_turno', 'web\TurnosController@buscarTurno')->name('users_cli.buscar_turno')->middleware('cliente');
    Route::get('{id}/eliminar_turno', 'web\TurnosController@eliminarTurno')->name('users_cli.eliminar_turno')->middleware('cliente');

    Route::delete('/delete', 'web\TurnosController@destroy')->name('turnos.delete')->middleware('auth');

});

/*
  Sucursal Routes
*/

Route::group([
    'middleware'    =>  'auth',
    'prefix' => 'sucursal'
], function () {
    Route::post('store', 'web\SucursalController@store')->name('sucursal.store');
    Route::get('index', 'web\SucursalController@index')->name('sucursal.index');
    Route::get('create', 'web\SucursalController@create')->name('sucursal.create');
    Route::put('{sucursal}/update', 'web\SucursalController@update')->name('sucursal.update');
    Route::get('{sucursal}/edit', 'web\SucursalController@edit')->name('sucursal.edit');
    Route::delete('/delete', 'web\SucursalController@destroy')->name('sucursal.delete');
    Route::get('restoreList', 'web\SucursalController@restoreList')->name('sucursal.restoreList');
    Route::post('restore', 'web\SucursalController@restore')->name('sucursal.restore');
});


/*
  Categoria Routes
*/

Route::group([
    'middleware'    =>  'auth',
    'prefix' => 'categoria'
], function () {
    Route::post('store', 'web\CategoriaController@store')->name('categoria.store');
    Route::get('index', 'web\CategoriaController@index')->name('categoria.index');
    Route::get('create', 'web\CategoriaController@create')->name('categoria.create');
    Route::put('{categoria}/update', 'web\CategoriaController@update')->name('categoria.update');
    Route::get('{categoria}/edit', 'web\CategoriaController@edit')->name('categoria.edit');
    Route::delete('/delete', 'web\CategoriaController@destroy')->name('categoria.delete');
    Route::get('restoreList', 'web\CategoriaController@restoreList')->name('categoria.restoreList');
    Route::post('restore', 'web\CategoriaController@restore')->name('categoria.restore');
});


/*
  Lugares Routes
*/

Route::group([
    'middleware'    =>  'auth',
    'prefix' => 'lugar'
], function () {
    Route::post('store', 'web\LugarController@store')->name('lugar.store');
    Route::get('index', 'web\LugarController@index')->name('lugar.index');
    Route::get('create', 'web\LugarController@create')->name('lugar.create');
    Route::put('{lugar}/update', 'web\LugarController@update')->name('lugar.update');
    Route::get('{lugar}/edit', 'web\LugarController@edit')->name('lugar.edit');
    Route::delete('/delete', 'web\LugarController@destroy')->name('lugar.delete');
    Route::get('restoreList', 'web\LugarController@restoreList')->name('lugar.restoreList');
    Route::post('restore', 'web\LugarController@restore')->name('lugar.restore');
});
/*
  Tatuaje Routes
*/

Route::group([
    'middleware'    =>  'auth',
    'prefix' => 'tatuaje'
], function () {
    Route::post('store', 'web\TatuajeController@store')->name('tatuaje.store');
    Route::get('index', 'web\TatuajeController@index')->name('tatuaje.index');
    Route::get('create', 'web\TatuajeController@create')->name('tatuaje.create');
    Route::put('{tatuaje}/update', 'web\TatuajeController@update')->name('tatuaje.update');
    Route::get('{tatuaje}/edit', 'web\TatuajeController@edit')->name('tatuaje.edit');
    Route::delete('/delete', 'web\TatuajeController@destroy')->name('tatuaje.delete');
});



/*
Route::post('loginTerms', 'Auth\LoginController@loginTerms')->name('loginTerms');
Route::post('password/code', 'Auth\ForgotPasswordController@numberCode')->name('password.code');
Route::post('password/updatepassword', 'Auth\ForgotPasswordController@passwordUpdate')->name('password.updatepassword');

Route::post('/cities/states', 'CityController@showByState')->name('citiesByState');
Route::post('/certification/store', 'CertificationController@store')->name('certification.store');

Route::group([
    'middleware'    =>  'auth',
    'prefix' => 'company'
], function () {
    Route::post('store', 'CompanyController@store')->name('company.store')->middleware('permission:users.create');
    Route::get('index', 'CompanyController@index')->name('company.index')->middleware('permission:users.index');
    Route::get('create', 'CompanyController@create')->name('company.create')->middleware('permission:users.create');
    Route::get('{company}/edit', 'CompanyController@edit')->name('company.edit')->middleware('permission:users.edit');
    Route::put('{company}/update', 'CompanyController@update')->name('company.update')->middleware('permission:users.edit');


    Route::post('search/company', 'CompanyController@searchCompany')->name('users.searchCompany');
});

Route::group([
    'middleware'    =>  'auth',
    'prefix' => 'eula'
], function () {
    Route::get('index', 'EulaController@index')->name('eula.index')->middleware('permission:users.index');
    Route::post('store', 'EulaController@store')->name('eula.store')->middleware('permission:users.create');
    Route::get('create', 'EulaController@create')->name('eula.create')->middleware('permission:users.create');
    Route::post('togglestate', 'EulaController@toggleState')->name('eula.togglestate')->middleware('permission:users.create');
    Route::put('{eula}/update', 'EulaController@update')->name('eula.update')->middleware('permission:users.edit');
    Route::get('{eula}/edit', 'EulaController@edit')->name('eula.edit')->middleware('permission:users.edit');
}); */

/* Projects Route */

/* Route::group([
    'middleware'    =>  'auth',
    'prefix' => 'projects'
], function () {
    Route::post('store', 'ProjectController@store')->name('projects.store')->middleware('permission:users.create');
    Route::get('index', 'ProjectController@index')->name('projects.index')->middleware('permission:users.index');
    Route::get('create', 'ProjectController@create')->name('projects.create')->middleware('permission:users.create');
    Route::put('{project}/update', 'ProjectController@update')->name('projects.update')->middleware('permission:users.edit');
    Route::get('{project}/edit', 'ProjectController@edit')->name('projects.edit')->middleware('permission:users.edit');
});
 */
/* Contracts Route */

/* Route::group([
    'middleware'    =>  'auth',
    'prefix' => 'contracts'
], function () {
    Route::post('store', 'ContractController@store')->name('contracts.store')->middleware('permission:users.create');
    Route::get('index', 'ContractController@index')->name('contracts.index')->middleware('permission:users.index');
    Route::get('create', 'ContractController@create')->name('contracts.create')->middleware('permission:users.create');
    Route::post('search/project', 'ContractController@searchProject')->name('users.searchProject');
    Route::get('{contract}/edit', 'ContractController@edit')->name('contracts.edit')->middleware('permission:users.edit');
    Route::put('{contract}/update', 'ContractController@update')->name('contracts.update')->middleware('permission:users.edit');
});
 */
Route::get('buscar/provincia', 'web\ProvinciaController@buscarProvincia');
Route::get('searchTatuaje', 'web\TatuajeController@searchTatuaje');
