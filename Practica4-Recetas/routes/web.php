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

Route::get('/', [App\Http\Controllers\iniciocontroller::class, 'index'])->name('inicio');


//Ruta para consumir un controlador llamado recetas
//route::get('/recetas','App\Http\Controllers\RecetaController');
Auth::routes();

Route::get('/home', [App\Http\Controllers\RecetaController2::class, 'index'])->name('home');

//Ruta controlador de recetas retornando el método index
route::get('/recetas','App\Http\Controllers\RecetaController2@index')->name('recetas.index');


//Ruta controlador de recetas retornando el método create
route::get('/recetas/create','App\Http\Controllers\RecetaController2@create')->name('recetas.create');

//Ruta controlador de recetas retornando el método store
route::post('/recetas','App\Http\Controllers\RecetaController2@store')->name('recetas.store');

//Ruta controlador de recetas retornando el método show
route::get('/recetas/{receta}', 'App\Http\Controllers\RecetaController2@show')->name('recetas.show');

//Ruta controlador de recetas retornando el método edit
route::get('/recetas/{receta}/edit', 'App\Http\Controllers\RecetaController2@edit')->name('recetas.edit');

//Ruta controlador de recetas retornando el método update
route::put('/recetas/{receta}', 'App\Http\Controllers\RecetaController2@update')->name('recetas.update');

//Ruta controlador de recetas retornando el método destroy
route::delete('/recetas/{receta}', 'App\Http\Controllers\RecetaController2@destroy')->name('recetas.destroy');

//Ruta para enlazar la categoria con las recetas
route::get('/categoria/{categoriaReceta}', 'App\Http\Controllers\CategoriasController@show')->name('categorias.show');
