<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    public $timestamps = false;

    protected $table ="articles";

    protected $fillable = ['title','fabricationYear','estado','inventory_id','user_id'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
    
    public function inventory()
    {
        return $this->belongsTo('App\Inventory');
    }
}
