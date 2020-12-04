<?php

namespace App\Http\Controllers;
use App\Models\Recetas2;
use Illuminate\Http\Request;

class iniciocontroller extends Controller
{
    //

    public function index()
    {
        //Obtener las 6 recetas mas nuevas
        $nuevas = Recetas2::orderBy('created_at', 'DESC')->limit(6)->get();
        //Despues se retorna a la vista inicio, pero se le agrega la variable nuevas
        return view('inicio.inicio', compact('nuevas'));
    }
}
