<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    public function collection()
    {
    	return $this->belongsTo(Collection::class);
    }
}
