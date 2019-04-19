<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserList extends Model{
	protected $fillable = ['list_name', 'author_id'];

	public function items(){
		return $this->hasMany(listItem::class);
	}

	public function addItem($attributes){
		$this->items()->create($attributes);
	}
}
