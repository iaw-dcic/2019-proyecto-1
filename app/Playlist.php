<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Playlist extends Model
{
    public function videos()
    {
        return $this->hasMany(Video::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
