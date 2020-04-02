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

Route::get('/', function () {
    
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::post('/home', 'HomeController@store')->name('home');

Route::match(['put', 'patch'], '/home', 'HomeController@put');



Route::get('/home/Expe/{id}', 'ExpeController@show')->name('Expe');
Route::delete('/home/Expe/{id}', 'ExpeController@delete')->name('Expe');

Route::post('/home/Expe/{id}', 'ExpeController@store')->name('Expe');



Route::get('/cv', 'CvController@index')->name('cv');

Route::get('/login2', function() {
    return view('auth.login2');
});


