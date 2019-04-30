<?php

namespace App;

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
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
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

    /*Retorna todas aquellas listas que fueron creadas por el usuario*/
    public function listas()
    {
        return $this->hasMany('App\ListaUsuarios','idUsuario');
    } 

    /*Retorna todas aquellas series que fueron creadas por el usuario*/
    public function series()
    {
        return $this->hasMany('App\Series','id_usuario');
    } 
}