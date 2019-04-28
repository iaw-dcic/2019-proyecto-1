<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Row extends Model{

    protected $fillable = [
        'cod', 'name', 'quantity','privacy',
    ];
}
