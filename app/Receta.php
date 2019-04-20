<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Receta extends Model
{
    public function scopeNombre($query,$nombre)
    {
        return $query->where('nombre', '<=', $nombre);
    }
    public function listaId()
{
    return $this->belongsTo(\App\Lista::class, 'lista_id');
}
}
