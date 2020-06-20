<?php

use Illuminate\Support\Facades\Route;
//use App\Mail\EntrevistaMail;
//use Illuminate\Support\Facades\Mail;
use App\Categoria;
use App\Empresa;


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

Route::get('/', 'InicioController@index');

Route::post('/', 'InicioController@mail' )->name('inicio');

//Route::get('/email', function(){
 //// return  $trabajodormail=Trabajador::find(1)->hasUser->email;
        
  //  Mail::to($trabajodormail)->send(new EntrevistaMail());
    
//});



Auth::routes();


Route::get('/categorias', function(){
  $Response=Categoria::all();
  return response()->json($Response,200);

})->name('categorias');


Route::get('/empresas', function(){
  $Response=DB::table('empresas')->leftJoin('users', 'empresas.user_id', '=', 'users.id')->
  select ('empresas.id','empresas.domicilio', 'users.name', 'empresas.numero_empleados', 'empresas.latitud', 'empresas.longitud', 'users.email')->get();

  return response()->json($Response,200);

})->name('empresas');


Route::get('/empresas/{id}', function($id){
  $Response=Empresa::find($id);
  return response()->json($Response,200);

})->name('empresaid');


Route::get('/categorias/{id}', function($id){
  $Response=Categoria::find($id);
  return response()->json($Response,200);

})->name('categoriaid');


Route::get('/search', 'SearchController@index');
Route::post('/search/{id}', 'SearchController@store')->name('apuntarse');

Route::get('/search/{id}', 'SearchController@oferta');


Route::get('/search/{id}/edit', 'EditOfertaController@show');

Route::post('/search/{id}/edit', 'EditOfertaController@store')->name('editar');

Route::match(['put', 'patch'], '/search/{id}', 'SearchController@put');


Route::get('/home', 'HomeController@index')->name('home');

Route::post('/home', 'HomeController@store')->name('home');

Route::match(['put', 'patch'], '/home', 'HomeController@put');



Route::get('/home/Expe/{id}', 'ExpeController@show')->name('Expe');
Route::delete('/home/Expe/{id}', 'ExpeController@delete')->name('Expe');

Route::post('/home/Expe/{id}', 'ExpeController@store')->name('Expe');


Route::post('/empresa/{id}', 'EmpresaController@store')->name('empresa');
Route::get('/empresa/{id}', 'EmpresaController@show');



Route::get('/empresa/{id}/oferta', 'OfertaController@index')->name('oferta');

Route::post('/empresa/{id}/oferta', 'OfertaController@store')->name('oferta');

Route::match(['put','patch'],'/empresa/{id}/oferta', 'OfertaController@put')->name('oferta');

Route::get('/empresa/{id}/published/{ofertaid}/trabajador/{tid}', 'MapaController@show');

Route::post('/empresa/{id}/published/{ofertaid}/trabajador/{tid}', 'MapaController@store')->name('contacto');

Route::get('/empresa/{id}/published/{ofertaid}/{trabajadorid}', 'CandidatosController@fetch_data');

Route::get('/home/entrevista/{contactoid}', 'EntrevistaController@show');


Route::get('/empresa/{id}/published', 'PublicadaController@index')->name('publicada');


Route::get('/empresa/{id}/published/{ofertaid}', 'CandidatosController@index');

Route::get('/empresa/{id}/published/{ofertaid}/fetch_data', 'CandidatosController@fetch_data');


Route::post('/empresa/{id}/published/{ofertaid}', 'CandidatosController@store')->name('candidatos');

Route::put('/empresa/{id}/published/{ofertaid}', 'CandidatosController@put')->name('candidatos');;




Route::get('/login2', function() {
    return view('auth.login2');
});


Route::get('/{id}', function () {
  return redirect()->back()->with('success', 'Tiene que elegir una oferta del listado primero');   
});