<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Libro extends Model
{
       protected $fillable = [
        'nombre', 'genero', 'autor',
    ];

      protected $hidden = [
        'id_usr'
    ];

     public function user()
	{
 		 return $this->belongsTo('App\User');
	}

	 public function lista()
	{
 		 return $this->belongsTo('App\Lista');
	}
}
