<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lista extends Model
{
    protected $fillable = [
        'name', 'share',
    ];

    public function cars(){

        return $this->hasMany(Car::class);

    }

}
