<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RecetaController extends Controller
{

    public function __invoke(){
        //Creamos un array para mandar a la vista
        //Consulta no. 1, Envio del array recetas a la vista
        $recetas=['Receta de fresa','Receta de uva','Receta de limon'];
        //Pasar a la vista el array (sintaxis 1):
        //Consulta no. 1, Envio del array recetas a la vista
        $categorias =['Comida mexicana','Comida argentina','Postres'];
                
        //Retornar a la vista recetas/index
        return view('recetas.index')
            ->with('recetas',$recetas)
            ->with('categorias',$categorias);
        
        //Pasar a la vista el array (sintaxis 2):
        //return view('recetas.index',compact('recetas','categorias'));
    
    }

    
}
