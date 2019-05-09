<?php

namespace App\Policies;
//Toda politica tiene que ver con un usuario, por eso se agrega esta entidad
use App\User;
use App\Lista;
use Illuminate\Auth\Access\HandlesAuthorization;

class ListPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function pass(User $user, Lista $list){
        //Si soy del id 50 y la lista que estoy editando tiene mi user id va a retornar true
        return $user->id == $list->user_id;
    }
}
