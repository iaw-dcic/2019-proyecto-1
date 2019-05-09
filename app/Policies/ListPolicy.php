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
        return $user->id == $list->user_id;
    }
}
