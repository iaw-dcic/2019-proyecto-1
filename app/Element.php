<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Element extends Model
{
    protected $fillable = [
        'name', 'description', 'colection_id', 'nroPaginas', 'edicion'
    ];
}
