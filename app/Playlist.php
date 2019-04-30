<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Playlist extends Model
{
    protected $table = "playlists";

    protected $fillable = [
        'name', 'visibility','user_id','spotify_url'
    ];

    public function user(){
         return $this->belongsTo('App\User');
    }

    public function songs(){
        return $this->hasMany('App\Song');
    }


}
