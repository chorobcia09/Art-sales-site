<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Artist;
use Illuminate\Auth\Access\HandlesAuthorization;

class ArtistPolicy
{
    use HandlesAuthorization;


    public function create(User $user)
    {
        return $user->role === 'admin';
    }

    public function update(User $user, Artist $artist)
    {
        return $user->role === 'admin';
    }

    public function delete(User $user, Artist $artist)
    {
        return $user->role === 'admin';
    }

}
