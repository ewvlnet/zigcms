<?php

namespace Database\Seeders;

use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $dt = Carbon::now();
        $post = Post::create([
            'user_id' => 1,
            'title' => fake()->unique()->sentence(6),
            'body' => fake()->realText(320),
            'status' => 'P',
            'created_at' => $dt->year(2023)->month(12)->day(04)->hour(20)->minute(31)->second(11)->toDateTimeString(),
        ]);
        $post->tags()->attach([1]);

        //for ($i = 0; $i < 100_000; $i++) {
        for ($i = 0; $i < 1_9; $i++) {
            $post = Post::create([
                'user_id' => random_int(1, 2),
                'category_id' => random_int(1, 10),
                'title' => fake()->unique()->sentence(7),
                'body' => fake()->realText(320),
                'status' => 'P',
                'created_at' => fake()->dateTimeThisYear(),
            ]);
            $post->tags()->attach([random_int(1, 10)]);
        }

    }
}
