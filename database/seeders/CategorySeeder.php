<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create(['name' => 'Undefined Category']);
        Category::create(['name' => 'Audio']);
        Category::create(['name' => 'Ebook']);
        Category::create(['name' => 'HTML']);
        Category::create(['name' => 'Image']);
        Category::create(['name' => 'PDF']);
        Category::create(['name' => 'PSD']);
        Category::create(['name' => 'Video']);
        Category::create(['name' => 'Wordpress']);
        Category::create(['name' => 'XLSX']);
    }
}
