<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lista extends Model
{
    protected $table = "lista";

    protected $fillable = ['name'];

    public function get_id(){
    	return $this->id;
    }


    public function articulos(){
        return $this->hasMany('App\Articulo');
    }
}
