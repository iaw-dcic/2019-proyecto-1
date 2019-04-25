<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    protected $fillable = [
        'list_id', 'brand', 'model', 'version',
    ];
    
}
