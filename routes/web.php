<?php

use Illuminate\Support\Facades\Route;



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

Auth::routes();

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



Route::get('/empresa/{id}', 'EmpresaController@show');

Route::post('/empresa/{id}', 'EmpresaController@store')->name('empresa');

Route::get('/empresa/{id}/oferta', 'OfertaController@index')->name('oferta');

Route::post('/empresa/{id}/oferta', 'OfertaController@store')->name('oferta');

Route::match(['put','patch'],'/empresa/{id}/oferta', 'OfertaController@put')->name('oferta');

Route::get('/empresa/{id}/published/{ofertaid}/trabajador/{tid}', 'MapaController@show');

Route::post('/empresa/{id}/published/{ofertaid}/trabajador/{tid}', 'MapaController@store')->name('contacto');

Route::get('/empresa/{id}/published/{ofertaid}/{trabajadorid}', 'CandidatosController@fetch_data');


Route::get('/empresa/{id}/published', 'PublicadaController@index')->name('publicada');


Route::get('/empresa/{id}/published/{ofertaid}', 'CandidatosController@index');

Route::get('/empresa/{id}/published/{ofertaid}/fetch_data', 'CandidatosController@fetch_data');


Route::post('/empresa/{id}/published/{ofertaid}', 'CandidatosController@store')->name('candidatos');

Route::put('/empresa/{id}/published/{ofertaid}', 'CandidatosController@put')->name('candidatos');;


Route::get('/cv', 'CvController@index')->name('cv');

Route::get('/login2', function() {
    return view('auth.login2');
});


