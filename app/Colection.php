<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Colection extends Model
{
    protected $fillable = [
        'name', 'description', 'user_id','estado' 
    ];
}
