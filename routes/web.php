<?php

use Illuminate\Support\Facades\Route;
//use App\Mail\EntrevistaMail;
//use Illuminate\Support\Facades\Mail;
use App\Categoria;
use App\Empresa;
use App\Experiencia;
use App\Oferta;


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

})->name('categorias')->middleware('protectjson');


Route::get('/empresas', function(){
  $Response=DB::table('empresas')->leftJoin('users', 'empresas.user_id', '=', 'users.id')->
  select ('empresas.id','empresas.domicilio', 'users.name', 'empresas.numero_empleados', 'empresas.latitud', 'empresas.longitud', 'users.email',  DB::raw('users.id as user_id'))->get();

  return response()->json($Response,200);

})->name('empresas')->middleware('protectjson');


Route::get('/trabajadores', function(){
  $Response=DB::table('trabajadors')->leftJoin('users', 'trabajadors.user_id', '=', 'users.id')
  ->leftJoin('expe', 'users.id', '=', 'expe.user_id')->
  select ('trabajadors.id','trabajadors.direccion',
  DB::raw('users.id as user_id'), 'users.name', 'users.email', DB::raw('count(expe.id) as numero_experiencias'))->
  groupBy('expe.user_id', 'trabajadors.id','trabajadors.direccion', 'users.name', 'users.email', 'users.id')->get();

  return response()->json($Response,200);

})->name('trabajadors')->middleware('protectjson');


Route::get('/experiencias', function(){
  $Response=DB::table('expe')->leftJoin('categorias', 'expe.categoria_id', '=', 'categorias.id')->
  select ('expe.id','expe.updated_at', 'expe.puesto', 'expe.empresa', 'expe.inicio', 'expe.fin', 'expe.user_id',
  'categorias.nombre','expe.descripcion', 'expe.categoria_id')->orderBy('expe.fin', 'desc')->get();

  return response()->json($Response, 200);
})->name('experiencias')->middleware('protectjson');






Route::get('/empresas/{id}', function($id){
  $Response=Empresa::find($id);
  return response()->json($Response,200);

})->name('empresaid')->middleware('protectjson');


Route::get('/categorias/{id}', function($id){
  $Response=Categoria::find($id);
  return response()->json($Response,200);

})->name('categoriaid')->middleware('protectjson');



Route::get('/trabajadoresporoferta', function(){
  $Response=DB::table('oferta_trabajador')->leftJoin('trabajadors', 'oferta_trabajador.trabajador_id', '=', 'trabajadors.id')->
  leftJoin('ofertas', 'oferta_trabajador.oferta_id', '=', 'ofertas.id')->leftJoin('users', 'trabajadors.user_id', '=', 'users.id')->
  leftJoin('provincia', 'trabajadors.provincia_id', '=', 'provincia.id')->
  select (DB::raw('provincia.region_name as region'), DB::raw('ofertas.id as oferta_id'), 'trabajadors.imagen','users.name', 'trabajadors.direccion', 'trabajadors.fecha',  DB::raw('trabajadors.id as trabajador_id'), 'oferta_trabajador.seleccionado')->get();
  return response()->json($Response,200);
})->name('trabajadoresporoferta')->middleware('protectjson');





Route::get('/search', 'SearchController@index');
Route::post('/search/{id}', 'SearchController@store')->name('apuntarse');

Route::get('/search/{id}', 'SearchController@oferta');


Route::get('/search/{id}/edit', 'EditOfertaController@show')->middleware('soyempresa');



Route::match(['put', 'patch'], '/search/{id}', 'SearchController@put')->middleware('soyempresa');


Route::get('/home', 'HomeController@index')->name('home');

Route::post('/home', 'HomeController@store')->name('homeexpe')->middleware('soytrabajador');

Route::match(['put', 'patch'], '/home', 'HomeController@put')->name('homeput')->middleware('soytrabajador');



Route::get('/home/Expe/{id}', 'ExpeController@show')->name('Expe')->middleware('soytrabajador');
Route::delete('/home/Expe/{id}', 'ExpeController@delete')->name('Expe')->middleware('soytrabajador');

Route::post('/home/Expe/{id}', 'ExpeController@store')->name('Expe')->middleware('soytrabajador');


Route::post('/empresa/{id}', 'EmpresaController@store')->name('empresa')->middleware('soyempresa');
Route::get('/empresa/{id}', 'EmpresaController@show')->middleware('soyempresa');



Route::get('/empresa/{id}/oferta', 'OfertaController@index')->name('oferta')->middleware('soyempresa');

Route::post('/empresa/{id}/oferta', 'OfertaController@store')->name('oferta')->middleware('soyempresa');

Route::match(['put','patch'],'/empresa/{id}/oferta', 'OfertaController@put')->name('oferta')->middleware('soyempresa');




Route::get('/empresa/{id}/published/{ofertaid}/trabajador/{tid}', 'EntrevistaController@show')->middleware('soyempresa');

Route::post('/empresa/{id}/published/{ofertaid}/trabajador/{tid}', 'EntrevistaController@store')->name('contacto')->middleware('soyempresa');

Route::get('/empresa/{id}/published/{ofertaid}/ofertatrabajador/{tid}', 'OfertatrabajadorController@show')->middleware('soyempresa');


Route::get('/empresa/{id}/published', 'PublicadaController@index')->name('publicada')->middleware('soyempresa');


Route::get('/empresa/{id}/published/{ofertaid}', 'CandidatosController@index')->middleware('soyempresa');




Route::post('/empresa/{id}/published/{ofertaid}', 'CandidatosController@store')->name('candidatos')->middleware('soyempresa');


Route::get('admins/login', 'AdministratorsController@showLoginForm');

Route::post('admins/login', 'AdministratorsController@login');

Route::get('admins/area', 'AdministratorsController@areaadmin');


Route::get('/login2', function() {
    return view('auth.login2');
});


Route::get('/{id}', function () {
  return redirect()->back()->with('success', 'Tiene que elegir una oferta del listado primero');   
});