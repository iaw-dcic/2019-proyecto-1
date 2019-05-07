<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Articulo extends Model
{
    protected $table= "articulos";
    protected $fillable= ['nombre','descripcion','puntaje','lista_id'];

    public function lista(){
        return $this->belongsTo(App\lista);
    }

}

