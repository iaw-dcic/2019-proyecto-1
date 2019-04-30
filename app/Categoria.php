<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $table = "categorias";

    protected $fillable = ['name'];

    public function get_id(){
    	return $this->id;
    }


    public function articulos(){
        return $this->hasMany('App\Articulo');
    }
}
