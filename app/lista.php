<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class lista extends Model
{
	
	public function songs(){

		return $this->hasMany(Song::class);

	}

}
