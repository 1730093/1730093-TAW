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
/*
Route::get('/', function () {
    return view('welcome');
});*/

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//Ruta principal de los meseros, esta manda al index
route::get('/meseros','App\Http\Controllers\meserosController@index')->name('meseros.index');

//Ruta controlador de los meseros retornando el método create
route::get('/meseros/create','App\Http\Controllers\meserosController@create')->name('meseros.create');

//Ruta controlador de recetas retornando el método store
route::post('/meseros','App\Http\Controllers\meserosController@store')->name('meseros.store');

//Ruta controlador las mesas retornando el método edit
route::get('/meseros/{mesero}/edit', 'App\Http\Controllers\meserosController@edit')->name('meseros.edit');

//Ruta controlador las mesas retornando el método update
route::put('/meseros/{mesero}', 'App\Http\Controllers\meserosController@update')->name('meseros.update');

//Ruta controlador las mesas retornando el método destroy
route::delete('/meseros/{mesero}', 'App\Http\Controllers\meserosController@destroy')->name('meseros.destroy');




//Ruta principal de las mesas, esta manda al index
route::get('/mesas','App\Http\Controllers\mesasController@index')->name('mesas.index');

//Ruta controlador de las mesas retornando el método create
route::get('/mesas/create','App\Http\Controllers\mesasController@create')->name('mesas.create');

//Ruta controlador las mesas retornando el método store
route::post('/mesas','App\Http\Controllers\mesasController@store')->name('mesas.store');
//Ruta controlador las mesas retornando el método show
route::get('/mesas/{mesa}', 'App\Http\Controllers\mesasController@show')->name('mesas.show');

//Ruta controlador las mesas retornando el método edit
route::get('/mesas/{mesa}/edit', 'App\Http\Controllers\mesasController@edit')->name('mesas.edit');

//Ruta controlador las mesas retornando el método update
route::put('/mesas/{mesa}', 'App\Http\Controllers\mesasController@update')->name('mesas.update');

//Ruta controlador las mesas retornando el método destroy
route::delete('/mesas/{mesa}', 'App\Http\Controllers\mesasController@destroy')->name('mesas.destroy');
