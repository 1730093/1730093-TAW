<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CategoriaReceta;
use App\Models\Recetas2;

class CategoriasController extends Controller
{
    
    public function show(CategoriaReceta $categoriaReceta){
        $recetas = Recetas2::where('categoria_id', $categoriaReceta->id)->paginate(6);
        return view('categorias.show', compact('recetas'));
    }
}
