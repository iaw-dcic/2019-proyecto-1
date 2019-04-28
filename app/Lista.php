<?php

namespace App;


use Illuminate\Database\Eloquent\Model;
use \App\User;
/**No se porque no le pude poner List */

class Lista extends Model
{
    /**Como No pude usar el nombre List Laravel no puede encontrar el nombre de la tabla
     * Por lo que aca le indico como se llama para que lo encuentre
     */

     protected $table = 'lists';

     /**Si no quiero utilizar un determinado campo hago lo siguiente
      * public $timestamps = false;
      */

      /**Arreglo asociativo cuyo valor va a ser un array con los atributos que nosotros
       * queremos permitir que sean cargados de forma masiva.
       */
      protected $fillable = ['name','isPublic'];

      /**Laravel por defecto va a crear una columna de Type tinyint. Pero yo quiero que sea boolean */
      protected $casts = [
          'isPublic' => 'boolean',

      ];

      /**Definimos una relacion para indicar que una Lista  pertenece a un ususario
       * Por eso esta en singular
       */
      public function user() //user + _id
      {
          return $this->belongsTo(User::class);
      }
}
