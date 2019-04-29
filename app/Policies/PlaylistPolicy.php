<?php

namespace App\Policies;

use App\User;
use App\Playlist;
use Illuminate\Auth\Access\HandlesAuthorization;

class PlaylistPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the playlist.
     *
     * @param  \App\User  $user
     * @param  \App\Playlist  $playlist
     * @return mixed
     */
    public function view(User $user, Playlist $playlist)
    {
        //ver solo si es publica o es el owner
        return (($playlist->user_id == $user->id)||($playlist->public));
    }


    /**
     * Determine whether the user can update the playlist.
     *
     * @param  \App\User  $user
     * @param  \App\Playlist  $playlist
     * @return mixed
     */
    public function update(User $user, Playlist $playlist)
    {
        return ($playlist->user_id == $user->id);
    }

}
