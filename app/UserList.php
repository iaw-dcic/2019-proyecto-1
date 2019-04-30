<?php

namespace Listbook;

use Illuminate\Database\Eloquent\Model;

class UserList extends Model
{
    protected $fillable = [
        'title','description','public','user_id','image'
    ];

    public function elements() {
        return $this->hasMany(ListElement::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function addElement($ListElement) {
        $this->elements()->create($ListElement);
    }
}
