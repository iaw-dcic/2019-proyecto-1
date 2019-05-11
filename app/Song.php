<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Song extends Model
{
    protected $table = "songs";

    protected $fillable = [
        'title', 'artist', 'album', 'image', 'playlist_id', 'year' ,'genre'
    ];

    public function playlist(){
        return $this->belongsTo('App\Playlist');
    }

}
