<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\mesas;

class meseros extends Model
{
    // Campos que se agregaran
    protected $fillable = [
        'nombre', 'apellidos', 'telefono', 'edad', 'correo', 'mesa_id'
    ];
    public function mesa(){
        //belongsTo se refiere a una realación 1:1 donde una receta esta asociada una mesa
        return $this->belongsTo(mesas::class, 'mesa_id');
    }
    use HasFactory;
}
