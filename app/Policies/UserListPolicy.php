<?php

namespace Listbook\Policies;

use Listbook\User;
use Listbook\UserList;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserListPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can modify the user list.
     *
     * @param  \Listbook\User  $user
     * @param  \Listbook\UserList  $userList
     * @return mixed
     */
    public function modify(User $user, UserList $userlist)
    {
        //solo el creador de la lista podrá modificar la misma
        return ($userlist->user_id == $user->id);
    }

}
