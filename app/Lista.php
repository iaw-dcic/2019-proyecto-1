<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lista extends Model
{
    protected $fillable = [
        'titulo', 'descripcion', 'juegos', 'public','autor'
    ];

    public function games(){
        return $this->hasMany(Juego::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
