<?php

namespace App\Policies;

use App\User;
use App\Lista;
use Illuminate\Auth\Access\HandlesAuthorization;

class PostPolicy
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
    public function pass(User $user, Lista $post){
        return $user->id == $post->user_id;
    }
}
