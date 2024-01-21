<?php

namespace App\Observers;

use App\Models\Profile;

class ProfileObserver
{
    /**
     * Handle the Profile "creating" event.
     */
    public function creating(Profile $profile): void
    {
        $profile->slug = str_slug($profile->name);
    }

    /**
     * Handle the Profile "updating" event.
     */
    public function updating(Profile $profile): void
    {
        $profile->slug = str_slug($profile->name);
    }

    /**
     * Handle the Profile "deleting" event.
     */
    public function deleting(Profile $profile): void
    {
        //
    }

}
