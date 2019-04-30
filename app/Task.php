<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    
    protected $fillable = [
        'id','cod', 'title', 'author','editorial','privacy',
    ];
}
