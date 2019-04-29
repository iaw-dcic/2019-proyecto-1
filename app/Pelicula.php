<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pelicula extends Model
{
  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
   protected $fillable = [

        'id_lista', 'titulo', 'genero', 'genero', 'review'

    ];

}
