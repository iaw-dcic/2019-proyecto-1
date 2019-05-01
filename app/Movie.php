<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model{
	
	protected $guarded = [];
    
    protected $fillable = [
        'titulo', 'director', 'lista', 'año'
    ];
	
	 public function list(){
		return $this->belongsTo(Usermovie::class);
	}
	
}