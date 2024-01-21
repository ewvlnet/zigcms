<?php

namespace App\Observers;

use App\Models\User;

class UserObserver
{
    /**
     * Handle the User "creating" event.
     */
    public function creating(User $user): void
    {
        $user->slug = str_slug($user->name);
        $user->name = ucwords($user->name);
    }

    /**
     * Handle the User "updating" event.
     */
    public function updating(User $user): void
    {
        $user->slug = str_slug($user->name);
        $user->name = ucwords($user->name);
    }

    /**
     * Handle the User "deleting" event.
     */
    public function deleting(User $user): void
    {
        //
    }
}
