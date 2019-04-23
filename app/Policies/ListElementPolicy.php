<?php

namespace App\Policies;

use App\User;
use App\ListElement;
use App\UserList;
use Illuminate\Auth\Access\HandlesAuthorization;

class ListElementPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can modify the list element in the userlist.
     *
     * @param  \App\User  $user
     * @param  \App\ListElement  $listElement
     * @return mixed
     */
    public function modify(User $user, ListElement $listElement)
    {
        //solo el creador de la lista podrá modificar la misma
        //dd($listElement->list()->user_id());
        $list_id = UserList::findOrFail($listElement->user_list_id);
        return $list_id->user_id == $user->id;
    }

}
