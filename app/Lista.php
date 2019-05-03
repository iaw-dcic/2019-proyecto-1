<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lista extends Model
{
    protected $table = "listas";

    //el 'id' lo agrega por defecto
    protected $fillable = ['user_id','nombre','descripcion','visible',];

    //ver   si     hay que agregar el    timestamp  --------^



    //Relaciones      1 lista -> muchas canciones
    public function canciones(){
        return $this->hasMany('App\Cancion'); 
    }


    //Relaciones      muchas listas -> 1 usuario
    public function usuario(){
        return $this->belongsTo('App\User');
 }


 //mensajes de error
 public static function messages($id = '') {
    return [
        'nombre.required' => 'Debe ingresar un nombre para la lista',
        'nombre.min' =>'El nombre de la lista debe ser de 3 caracteres o mas',
        'descripcion.required' => 'Debe ingresar una descripcion de la lista',
        'visible.required' => 'Debe seleccionar visibilidad de la lista',
    ];
}

}
