<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lista extends Model
{
    protected $table = 'listas';


      public function book()
    {
        return $this->hasMany('App\Book', 'list_id');
    }
}
