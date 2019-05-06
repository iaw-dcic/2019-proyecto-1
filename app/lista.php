<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\goal;

class lista extends Model
{       
    public function goals(){

        return $this->hasMany(goal::class);
    }
}
