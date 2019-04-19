<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $fillable = [
        'songname', 'artist', 'album', 'list_id',
    ];
}
