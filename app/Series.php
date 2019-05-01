<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Series extends Model
{
    protected $collection='adminseries';
 
    protected $fillable = ['nombre', 'temporadas', 'puntuacion', 'comentarios'];
 
    protected $hidden = ['id_compartidas','created_at', 'updated_at'];

    /**Retornara la lista a la cual se encuentra asociada */
    public function lista()
    {
        return $this->belongsTo('App\ListaUsuarios', 'id_lista');
    }  

    /**Retornara el usuario que creo la serie */
    public function usuarioCreador()
    {
        return $this->belongsTo('App\User', 'id_usuario');
    }  
}
