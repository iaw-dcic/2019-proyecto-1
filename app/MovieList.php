<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MovieList extends Model
{

    public $table = "movies_lists";

        /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'name',
        'is_public',
    ];

    public function user(){
        
        return $this->belongsTo(User::class);
    }

    public function movies(){

        return $this->hasMany(Movie::class);
    }
}
