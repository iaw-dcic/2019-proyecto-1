<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Perfil extends Model
{
  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
   protected $fillable = [

        'id_user', 'edad', 'ciudad'

    ];

    protected $primaryKey = 'id_user';

}
