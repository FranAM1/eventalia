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
        Category::create(['category_name' => 'Concierto']);
        Category::create(['category_name' => 'Deporte']);
        Category::create(['category_name' => 'Cultura']);
        Category::create(['category_name' => 'Gastronomia']);
        Category::create(['category_name' => 'Fiesta']);
        Category::create(['category_name' => 'Conferencia']);
        Category::create(['category_name' => 'Festival']);
        Category::create(['category_name' => 'Otros']);
    }
}
