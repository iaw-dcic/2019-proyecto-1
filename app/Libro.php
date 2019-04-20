<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Libro extends Model
{
    public function listaLibro()
    {
        return $this->belongsTo(ListaLibro::class);
    }
}
