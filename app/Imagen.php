<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Imagen extends Model
{
    protected $table= "images";
    protected $fillable= ['name','articulo_id'];

    public function articulo(){
        return $this -> belongsTo("App\Articulo");
    }
}
