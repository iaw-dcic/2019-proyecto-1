<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class lista extends Model
{       
    public function goals(){

        return $this->hasMany(Goal::class);
    }
}
