<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Juego extends Model
{
    protected $table = "juegos";
    protected $fillable = [
        'name', 'genre', 'company', 'release_date', 'list_id','id'
    ];

    protected $casts = ['release_date' => 'datetime'];

    public function Lista(){
        return $this->belongsTo(Lista::class);
    }
}
