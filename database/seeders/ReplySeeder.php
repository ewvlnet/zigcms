<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Reply;

class ReplySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i < 1_1; $i++) {
            Reply::create(['comment_id' => rand(1, 9), 'user_id' => rand(1, 3), 'message' => fake()->realText(189)]);
        }
    }
}
