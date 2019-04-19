<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ListItem extends Model{

	protected $guarded = [];

    public function list(){
		return $this->belongsTo(UserList::class);
	}
}
