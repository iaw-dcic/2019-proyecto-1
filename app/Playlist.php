<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Playlist extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'descripcion'
    ];

    public function videos()
    {
        return $this->hasMany('App\Video');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
