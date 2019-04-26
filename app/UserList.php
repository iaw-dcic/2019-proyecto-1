<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserList extends Model{
	protected $fillable = ['list_name', 'user_id', 'public', 'likes'];

	public function items(){
		return $this->hasMany(listItem::class);
	}

	public function addItem($attributes){
		$this->items()->create($attributes);
	}

    public function user(){
		return $this->belongsTo(User::class);
	}
}
