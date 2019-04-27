<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Playlist extends Model
{
    public function videos()
    {
        return $this->hasMany('App\Video');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
