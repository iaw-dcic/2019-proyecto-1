<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lista extends Model
{
    protected $table = "listas";

    //el 'id' lo agrega por defecto
    protected $fillable = ['user_id','nombre','cantidad_canciones'];

    //ver   si     hay que agregar el    timestamp  --------^



    //Relaciones      1 lista -> muchas canciones
    public function canciones(){
        return $this->hasMany('App\Cancion'); 
    }


    //Relaciones      muchas listas -> 1 usuario
    public function usuario(){
        return $this->belongsTo('App\User');
 }


}
