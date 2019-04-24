<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    public $timestamps = false;

    protected $table= "inventories";    
    
    protected $fillable= ['user_id','public_status'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function articles(){
        return $this->hasMany(Article::class);
    }

}
