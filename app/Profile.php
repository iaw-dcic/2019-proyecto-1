<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = [
        'nombre', 'id_usuario'
    ];

    public function user()
	{
 		 return $this->belongsTo('App\User');
	}
}
