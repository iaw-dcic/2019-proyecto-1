<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $table = 'items';

    public $primaryKey ='id';

    public  $timestamps = true;

    public function post(){
        return $this ->belongsTo('\App\Post','foreing_key');
    }
}
