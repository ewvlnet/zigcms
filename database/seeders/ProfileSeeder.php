<?php

namespace Database\Seeders;

use App\Models\Profile;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $subscriber = Profile::create([
            'name' => 'Subscriber',
            'slug' => 'subscriber',
            'description' => 'somebody who can only manage their profile'
        ]);

        $contributor = Profile::create([
            'name' => 'Contributor',
            'slug' => 'contributor',
            'description' => 'somebody who can write and manage their own posts but cannot publish them'
        ]);

        $author = Profile::create([
            'name' => 'Author',
            'slug' => 'author',
            'description' => 'somebody who can publish and manage their own posts'
        ]);

        $editor = Profile::create([
            'name' => 'Editor',
            'slug' => 'editor',
            'description' => 'somebody who can publish and manage posts including the posts of other users'
        ]);

        $administrator = Profile::create([
            'name' => 'Administrator',
            'slug' => 'administrator',
            'description' => 'somebody with access to the site administration features'
        ]);
    }
}
