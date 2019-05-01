<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ListaUsuarios extends Model
{
   public function series()
    {
        return $this->hasMany('App\Series');
    }    

    /*Retorna el usuario que creo la lista */
    public function usuario()
    {
        return $this->belongsTo('App\User','idUsuario');
    }  

    /*Retorna todas las series que se encuentran asociadas a la lista*/
    public function seriesAsociadas()
    {
        return $this->hasMany('App\Series','id_lista');
    }  
}
