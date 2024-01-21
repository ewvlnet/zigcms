<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'User Subscriber',
            'email' => 'subscriber@email.com',
            'password' => bcrypt('a3523efc'),
            'email_verified_at' => now()
        ])->profiles()->attach([1]);

        User::create([
            'name' => 'User Contributor',
            'email' => 'contributor@email.com',
            'password' => bcrypt('30ab155g'),
            'email_verified_at' => now()
        ])->profiles()->attach([2]);

        User::create([
            'name' => 'User Author',
            'email' => 'author@email.com',
            'password' => bcrypt('708855w7'),
            'email_verified_at' => now()
        ])->profiles()->attach([3]);

        User::create([
            'name' => 'User Editor',
            'email' => 'editor@email.com',
            'password' => bcrypt('5e8874c7'),
            'email_verified_at' => now()
        ])->profiles()->attach([4]);

        User::create([
            'name' => 'User Administrator',
            'email' => 'administrator@email.com',
            'password' => bcrypt('df5f41j9'),
            'email_verified_at' => now()
        ])->profiles()->attach([5]);
    }
}
