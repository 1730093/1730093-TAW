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

//Generar una ruta a la vista formulario
Route::get('/formulario', function () {
    return view('formulario');
});
//Generar una ruta a la vista principal
Route::get('/principal', function () {
    return view('principal');
});
//Generar una ruta a la vista hola
Route::get('/hola', function () {
    return view('hola');
});
//Recibe un parametro nombre y lo retorna 
Route::get('/{nombre}', function ($nombre) {
    return $nombre;
});


