<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lista extends Model
{
    protected $fillable = [
        'nombre', 'id_usuario'
    ];

    public function libros()
    {
    	return $this->hasMany('App\Libro');
    }
}
