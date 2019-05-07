<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pelicula extends Model
{
    public function getUser(){
        return $this->belongsTo('App\User');
    }

    public function getGenero(){
        return $this->belongsTo('App\Genero');
    }
}
