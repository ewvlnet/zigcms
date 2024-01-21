<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Comment;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i < 1_1; $i++) {
            Comment::create(['post_id' => rand(1, 3), 'user_id' => rand(1, 3), 'message' => fake()->realText(320)]);
        }
    }
}
