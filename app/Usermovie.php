<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class Usermovie extends Model{
    
    protected $fillable = [
        'nombre',
		'creador_id',
		'public'
    ];
		
	public function movies(){
		return $this->hasMany(Movie::class);
	}
	
	public function addMovie($attributes){
		$this->movies()->create($attributes);
	}
	
    public function user(){
		return $this->belongsTo(User::class);
	}
	
}