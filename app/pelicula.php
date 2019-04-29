<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pelicula extends Model
{
  protected $fillable= ['listaid','nombre','descripcion','genero',];  
}
