<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Thing extends Model
{
    protected $fillable = [
        'title'
    ];

    public function items(){
        return $this->hasMany(Item::class);
    }
}
