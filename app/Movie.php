<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    protected $fillable = [
        'name',
        'director',
        'genre',
        'list_id',
    ];

    public function movieList()
    {
        return $this->belongsTo(MovieList::class);
    }
}
