<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class jugador extends Model
{
    protected $fillable = [ 'name','id_partido', ];
}
