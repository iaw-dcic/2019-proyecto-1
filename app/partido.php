<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class partido extends Model
{
    protected $fillable = [ 'name','place','category','public', ];
}
