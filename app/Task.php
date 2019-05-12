<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    
    protected $fillable = [
        'name','desc','genre','privacy','owner_id','owner_name',
    ];
}
