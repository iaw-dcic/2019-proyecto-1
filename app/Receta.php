<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Receta extends Model
{
    public function scopeNombre($query,$nombre)
    {
        return $query->where('nombre', '<=', $nombre);
    }
}
