<?php

namespace App\Policies;

use App\Models\Conversacione;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ConversacionPolicy
{
    use HandlesAuthorization;

    public function view(User $user, Conversacione $conversacione)
    {
        return $user->id === $conversacione->user_one_id || $user->id === $conversacione->user_two_id  ;
    }

    public function create(User $user)
    {
        return true;
    }
}
