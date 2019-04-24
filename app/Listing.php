<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Listing extends Model
{
    public function games() {
        return $this->belongsToMany('App\Game');
    }

    /*public function user() {
        return $this->belongsTo('App\User');
    }*/
    
}
