<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            ProfileSeeder::class,
            PermissionSeeder::class,
            UserSeeder::class,
            TagSeeder::class,
            CategorySeeder::class,
            AttachSeeder::class,
            PostSeeder::class,
            PageSeeder::class,
            CommentSeeder::class,
            ReplySeeder::class,
        ]);
    }
}
