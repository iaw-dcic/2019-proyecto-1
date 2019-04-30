<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'table_id', 'name', 'author', 'editorial', 'publication_date', 'country_id', 'synopsis',
    ];
}
