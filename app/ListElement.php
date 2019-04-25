<?php

namespace Listbook;

use Illuminate\Database\Eloquent\Model;

class ListElement extends Model
{
    protected $fillable = [
        'name','description', 'user_list_id'
    ];

    public function list() {
        return $this->belongsTo(UserList::class);
    }
}
