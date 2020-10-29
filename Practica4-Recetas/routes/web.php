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


//Ruta para consumir un controlador llamado recetas
//route::get('/recetas','App\Http\Controllers\RecetaController');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Ruta controlador de recetas retornando el método index
route::get('/recetas','App\Http\Controllers\RecetaController2@index')->name('recetas.index');


//Ruta controlador de recetas retornando el método create
route::get('/recetas/create','App\Http\Controllers\RecetaController2@create')->name('recetas.create');

//Ruta controlador de recetas retornando el método store
route::post('/recetas','App\Http\Controllers\RecetaController2@store')->name('recetas.store');
