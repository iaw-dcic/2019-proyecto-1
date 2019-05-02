<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $fillable = [
        'nombre_club', 'nombre_estadio', 'capacidad_estadio','pais','list_id'
    ];

}
