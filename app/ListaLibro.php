<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ListaLibro extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function libros(){
        return $this->hasMany(Libro::class);
    }
}
