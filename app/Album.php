<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Album extends Model{
    
    protected $fillable = [
        'list_name', 'public', 'owner'
    ];

    protected $primaryKey = 'list_id';

}