<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Collection extends Model
{
    public function books()
    {
    	return $this->hasMany(Book::class);
    }

    public function user()
    {
    	return $this->belongsTo(User::class);
    }
}
