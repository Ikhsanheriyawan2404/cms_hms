<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'name' => 'Tips dan Trik',
            'slug' => 'tips-dan-trik',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Category::create([
            'name' => 'Transportasi',
            'slug' => 'transportasi',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Category::create([
            'name' => 'Kesehatan',
            'slug' => 'kesehatan',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Category::create([
            'name' => 'Tokoh',
            'slug' => 'tokoh',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Category::create([
            'name' => 'Bisnis',
            'slug' => 'bisnis',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
