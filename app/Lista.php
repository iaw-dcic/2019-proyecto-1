<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lista extends Model
{
    protected $fillable = [
        'nombre', 'usuario','public'
    ];
    public function autorId()
    {
        return $this->belongsTo(\App\User::class, 'usuario');
    }
}