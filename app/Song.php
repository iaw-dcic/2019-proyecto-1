<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Song extends Model{
    
    protected $fillable = [
        'song_name', 'artist', 'album', 'release_year', 'notes'
    ];

    protected $primaryKey = 'song_id';

}