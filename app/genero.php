<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Genero extends Model
{
    protected $fillable = [
        'genero',
    ];

    public function getPeliculas(){
        return $this->hasMany('App\Pelicula');
    }
}
