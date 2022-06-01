<?php

namespace Database\Seeders;

use App\Models\AboutHeader;
use Illuminate\Database\Seeder;

class AboutHeaderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        AboutHeader::create([
            'title' => 'Halaman about',
            'quote' => 'Space untuk kalimat promo halaman about',
            'keyword' => 'Test keyword halaman about',
            'description' => 'Test deskripsi halaman about',
        ]);
    }
}
