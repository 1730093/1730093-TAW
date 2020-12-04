<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recetas2 extends Model
{ 
    // Campos que se agregaran
    protected $fillable = [
        'titulo', 'preparacion', 'ingredientes', 'imagen', 'categoria_id'
    ];
    
    // Obtiene la categoria de la receta via Foreign Key (FK)
    public function categoria(){
        //belongsTo se refiere a una realación 1:1 donde una receta esta asociada una categoría
        return $this->belongsTo(CategoriaReceta::class);
    }
    
    //Obtener el usuario que creo la receta
    public function autor(){
        return $this->belongsTo(User::class, 'user_id');
    }

    // Obtiene la información del usuario via FK
    //SE DESCOMENTA CUANDO TENGA CLASE AUTOR
    /*
    public function autor(){
        return $this->belongsTo(User::class, 'user_id'); // FK de esta tabla
    }*/
        
    use HasFactory;
}
