<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model{
    public $timestamps = false;

    public function getUser(){
        return $this->belongsTo('App\User');
    }

    public function getPhotos(){
        return $this->hasMany('App\Photo');
    }

    public function getComments(){
        return $this->hasMany('App\Comment');
    }
}
