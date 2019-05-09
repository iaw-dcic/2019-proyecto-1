<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
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

    public function pass(User $userActual, User $user){
        //Si soy del id 50 y la lista que estoy editando tiene mi user id va a retornar true
        return $userActual->id == $user->id;
    }
}
