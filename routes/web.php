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

Route::get('/search/{id}', 'SearchController@oferta');

Route::post('/search/{id}', 'SearchController@store');


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



Route::get('/empresa/{id}/published', 'PublicadaController@index')->name('publicada');

Route::get('/cv', 'CvController@index')->name('cv');

Route::get('/login2', function() {
    return view('auth.login2');
});


