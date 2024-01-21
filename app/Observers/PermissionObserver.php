<?php

namespace App\Observers;

use App\Models\Permission;

class PermissionObserver
{
    /**
     * Handle the Permission "creating" event.
     */
    public function creating(Permission $permission)
    {
        $permission->slug = str_slug($permission->name);
    }

    /**
     * Handle the Permission "updating" event.
     */
    public function updating(Permission $permission)
    {
        $permission->slug = str_slug($permission->name);
    }

    /**
     * Handle the Permission "deleting" event.
     */
    public function deleting(Permission $permission): void
    {
        //
    }

}
