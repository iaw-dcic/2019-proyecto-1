<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cancion extends Model
{
    protected $table = "canciones";

    //el 'id' me lo agrega por defecto
    protected $fillable = ['lista_id','nombre','duracion','album','autor','fecha_lanzamiento'];

    //ver   si     hay que agregar el    timestamp  --------^


     //Relaciones      muchas canciones -> 1 lista
     public function lista(){
            return $this->belongsTo('App\Lista');
     }


}
