<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model{
    public $timestamps = false;

    public function getPost(){
        return $this->belongsTo('App\Post');
    }

    public function getUser(){
        return $this->belongsTo('App\User');
    }
}
