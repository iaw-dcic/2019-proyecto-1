<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ingrediente_de_receta extends Model
{
    protected $table= 'ingredientes_de_receta';
     

public function ingredienteId()
{
    return $this->belongsTo(\App\Ingrediente::class, 'ingrediente_id');
}

public function medidaId()
{
    return $this->belongsTo(\App\Medida::class, 'medida_id');
}
}