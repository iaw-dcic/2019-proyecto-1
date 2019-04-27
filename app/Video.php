<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    public function playlist()
    {
        return $this->belongsTo(Playlist::class);
    }
}
