<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
/**No se porque no le pude poner List */

class Lista extends Model
{
    /**Como No pude usar el nombre List Laravel no puede encontrar el nombre de la tabla
     * Por lo que aca le indico como se llama para que lo encuentre
     */

     protected $table = 'lists';
}
