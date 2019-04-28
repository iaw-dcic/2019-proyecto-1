<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Song extends Model{
    
    protected $fillable = [
        'song_name', 'artist', 'album', 'release_year', 'notes'
    ];

    protected $primaryKey = 'song_id';

    public function album () {
        return $this->belongsTo(Album::class,'list_id','list_id');
    }
}