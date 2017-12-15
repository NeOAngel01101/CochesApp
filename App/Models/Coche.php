<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Coche extends Model {
    protected $table = 'coche';
    protected $fillable = ['imagen', 'imagen2', 'nombre', 'tipo', 'potencia', 'cilindros', 'aceleracion', 'parmaxima', 'velocidadmaxima', 'turbo', 'traccion', 'marca', 'year', 'precio'];

    public function comments(){
        return $this->hasMany('\App\Models\Comment')->orderBy('created_at', 'asc');
    }
}