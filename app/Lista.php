<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lista extends Model
{
    protected $fillable = [
        'listname', 'genre', 'description', 'visibility', 'user_id',
    ];
    //
}
