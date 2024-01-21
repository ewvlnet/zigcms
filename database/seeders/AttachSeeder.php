<?php

namespace Database\Seeders;

use App\Models\Profile;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AttachSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        /**
         * Attach permissions to profiles
         */

        $subscriber = Profile::where('slug', 'subscriber')->first();
        $subscriber->permissions()->attach([1]);

        $contributor = Profile::where('slug', 'contributor')->first();
        $contributor->permissions()->attach([31, 32, 33, 34, 35]);

        $author = Profile::where('slug', 'author')->first();
        $author->permissions()->attach([31, 32, 33, 34, 35, 36]);

        $editor = Profile::where('slug', 'editor')->first();
        $editor->permissions()->attach([21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 40, 41, 42, 46, 47, 48, 49, 50, 51, 52, 53, 54, 55, 56, 57]);

        $administrator = Profile::where('slug', 'administrator')->first();
        $administrator->permissions()->attach([1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 40, 41, 42, 43, 44, 45, 46, 47, 48, 49, 50, 51, 52, 53, 54, 55, 56, 57, 58]);
    }
}
