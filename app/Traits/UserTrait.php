<?php

namespace App\Traits;

use App\Models\Profile;
use App\Models\User;

trait UserTrait
{
    /**
     * Relationship with profiles
     * @return mixed
     */
    public function profiles()
    {
        return $this->belongsToMany(Profile::class);
    }

    /**
     * Get all permissions from User
     * @return array
     */
    public function permissions(): array
    {
        $user = User::with(['profiles.permissions'])->where('id', $this->id)->first();

        $permissions = [];
        foreach ($user->profiles as $profile) {
            foreach ($profile->permissions as $permission) {
                array_push($permissions, $permission->name);
            }
        }
        return $permissions;
    }

    /**
     * Check if user has permission
     * @param string $permissionName
     * @return bool
     */
    public function hasPermission(string $permissionName): bool
    {
        return in_array($permissionName, $this->permissions());
    }

}
