<?php

namespace App;

use \App\Lista;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','activar2F','semilla'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * $hidden Eloquent me pone estos atributos ocultos
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**Declaracion de metodos estaticos corresponden a la clase y la clase va a corresponder
     * a la tabla de la Base de Datos.
     */
    public static function findByEmail($email)
    {
        return User::where(compact('email'))->first();
    }
    /**Fin de declaracion de metodos estaticos */

    /**Un usuario tiene muchas listas
     * Se pone en plural para representar eso, estos detalles mejoran la legibilidad del codigo
     */
    public function lists()
    {
        return $this->hasMany(Lista::class);
    }

    public function generar_semilla(){

    }


}
