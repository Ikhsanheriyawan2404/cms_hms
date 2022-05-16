<?php

namespace Database\Seeders;

use App\Models\About;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class AboutSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $title =  'Ikhsan Heiryawan';
        About::create([
            'title' => $title,
            'contents' => 'Ikhsan Heiryawan',
            'slug' => Str::slug($title),
        ]);

        $title =  'Ikhsan Heiryawan';
        About::create([
            'title' => $title,
            'contents' => 'Ikhsan Heiryawan',
            'slug' => Str::slug($title),
        ]);
    }
}
