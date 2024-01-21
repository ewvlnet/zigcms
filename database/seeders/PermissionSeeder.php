<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Permission::create(['name' => 'subscribers', 'description' => 'Basic profile, you can just edit your access data']);

        Permission::create(['name' => 'profiles', 'description' => 'Have access to profiles']);
        Permission::create(['name' => 'profiles_create', 'description' => 'Can create profiles']);
        Permission::create(['name' => 'profiles_read', 'description' => 'Can read profiles']);
        Permission::create(['name' => 'profiles_update', 'description' => 'Can update profiles']);
        Permission::create(['name' => 'profiles_delete', 'description' => 'Can delete profiles']);
        Permission::create(['name' => 'profile_permissions', 'description' => 'Has access to permission profile']);

        Permission::create(['name' => 'permissions', 'description' => 'Have access to permissions']);
        Permission::create(['name' => 'permissions_create', 'description' => 'Can create permissions']);
        Permission::create(['name' => 'permissions_read', 'description' => 'Can read permissions']);
        Permission::create(['name' => 'permissions_update', 'description' => 'Can update permissions']);
        Permission::create(['name' => 'permissions_delete', 'description' => 'Can delete permissions']);
        Permission::create(['name' => 'permission_profiles', 'description' => 'Has access to permission profile']);

        Permission::create(['name' => 'users', 'description' => 'Have access to users']);
        Permission::create(['name' => 'users_create', 'description' => 'Can create users']);
        Permission::create(['name' => 'users_read', 'description' => 'Can read users']);
        Permission::create(['name' => 'users_update', 'description' => 'Can update users']);
        Permission::create(['name' => 'users_delete', 'description' => 'Can delete users']);
        Permission::create(['name' => 'user_profile', 'description' => 'Has access to user_profile']);
        Permission::create(['name' => 'user_favorites', 'description' => 'Has access to user_profile']);

        Permission::create(['name' => 'categories', 'description' => 'Have access to categories']);
        Permission::create(['name' => 'categories_create', 'description' => 'Can create categories']);
        Permission::create(['name' => 'categories_read', 'description' => 'Can read categories']);
        Permission::create(['name' => 'categories_update', 'description' => 'Can update categories']);
        Permission::create(['name' => 'categories_delete', 'description' => 'Can delete categories']);

        Permission::create(['name' => 'tags', 'description' => 'Have access to tags']);
        Permission::create(['name' => 'tags_create', 'description' => 'Can create tags']);
        Permission::create(['name' => 'tags_read', 'description' => 'Can read tags']);
        Permission::create(['name' => 'tags_update', 'description' => 'Can update tags']);
        Permission::create(['name' => 'tags_delete', 'description' => 'Can delete tags']);

        Permission::create(['name' => 'posts', 'description' => 'Have access to posts']);
        Permission::create(['name' => 'posts_create', 'description' => 'Can create posts']);
        Permission::create(['name' => 'posts_read', 'description' => 'Can read posts']);
        Permission::create(['name' => 'posts_update', 'description' => 'Can update posts']);
        Permission::create(['name' => 'posts_delete', 'description' => 'Can delete posts']);
        Permission::create(['name' => 'posts_publish', 'description' => 'Can publish posts']);

        Permission::create(['name' => 'pages', 'description' => 'Have access to pages']);
        Permission::create(['name' => 'pages_create', 'description' => 'Can create pages']);
        Permission::create(['name' => 'pages_read', 'description' => 'Can read pages']);
        Permission::create(['name' => 'pages_update', 'description' => 'Can update pages']);
        Permission::create(['name' => 'pages_delete', 'description' => 'Can delete pages']);
        Permission::create(['name' => 'pages_publish', 'description' => 'Can publish pages']);

        Permission::create(['name' => 'settings', 'description' => 'Can view and edit general application settings']);
        Permission::create(['name' => 'about', 'description' => 'Can see about page']);
        Permission::create(['name' => 'internal_dashboard', 'description' => 'Can access the internal dashboard']);

        Permission::create(['name' => 'comments', 'description' => 'Have access to comments']);
        Permission::create(['name' => 'comments_create', 'description' => 'Can create comments']);
        Permission::create(['name' => 'comments_read', 'description' => 'Can read comments']);
        Permission::create(['name' => 'comments_update', 'description' => 'Can update comments']);
        Permission::create(['name' => 'comments_delete', 'description' => 'Can delete comments']);
        Permission::create(['name' => 'comments_publish', 'description' => 'Can publish comments']);

        Permission::create(['name' => 'replies', 'description' => 'Have access to replies']);
        Permission::create(['name' => 'replies_create', 'description' => 'Can create replies']);
        Permission::create(['name' => 'replies_read', 'description' => 'Can read replies']);
        Permission::create(['name' => 'replies_update', 'description' => 'Can update replies']);
        Permission::create(['name' => 'replies_delete', 'description' => 'Can delete replies']);
        Permission::create(['name' => 'replies_publish', 'description' => 'Can publish replies']);

        Permission::create(['name' => 'features', 'description' => 'Have access to manage features in homepage']);
    }
}
