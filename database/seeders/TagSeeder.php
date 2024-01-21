<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Tag::create(['name' => 'Animals']);
        Tag::create(['name' => 'Anime']);
        Tag::create(['name' => 'Baby']);
        Tag::create(['name' => 'Bear']);
        Tag::create(['name' => 'Blonde']);
        Tag::create(['name' => 'Bird']);
        Tag::create(['name' => 'Building']);
        Tag::create(['name' => 'Business']);
        Tag::create(['name' => 'Bugs']);
        Tag::create(['name' => 'Cars']);
        Tag::create(['name' => 'Cat']);
    }
}
