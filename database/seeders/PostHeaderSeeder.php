<?php

namespace Database\Seeders;

use App\Models\PostHeader;
use Illuminate\Database\Seeder;

class PostHeaderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PostHeader::create([
            'title' => 'Judul post header',
            'quote' => 'Space untuk kalimat promo halaman post',
            'keyword' => 'Test keyword halaman post',
            'description' => 'Test deskripsi halaman post',
        ]);
    }
}
