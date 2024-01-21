<?php

namespace Database\Seeders;

use App\Models\Page;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Page::create([
            'user_id' => 1,
            'title' => 'Page One',
            'body' => '<h1>Page One<h1><p> <strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. <br>Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book... </p>',
        ]);

        Page::create([
            'user_id' => 1,
            'title' => 'Page Two',
            'body' => '<h1>Page Two<h1><p> <strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. <br>Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book... </p>',
        ]);
    }
}
