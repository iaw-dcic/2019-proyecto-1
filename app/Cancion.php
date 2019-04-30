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




      //mensajes de error
    public static function messages($id = '') {
       return [
           'nombre.required' => 'Debe ingresar un nombre para la cancion',
           'nombre.min' =>'El nombre de la cancion debe ser de 3 caracteres o mas',
           'duracion.different' => 'La duracion de la cancion debe ser mayor a 00:00:00',
           'album.required' => 'Debe ingresar el album al que pertenece la cancion',
           'album.min' =>'El nombre del album debe ser de 2 caracteres o mas',
           'autor.required' => 'Debe ingresar un autor para la cancion',
           //la fecha de lanzamiento de la cancion es opcional
       ];
    }

}
