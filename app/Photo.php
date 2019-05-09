<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model{
    public $timestamps = false;
    protected $fillable = ['photo_url'];

    public function getPost(){
        return $this->belongsTo('App\Post');
    }

    public function getUrlPathAttribute(){
        return \Storage::url($this->photo_url);
    }
}
