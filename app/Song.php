<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Song extends Model{
    
    protected $fillable = [
        'song_id', 'artist', 'album', 'release_year', 'notes'
    ];

}