<?php

namespace Database\Seeders;

use App\Models\DeliveryHeader;
use Illuminate\Database\Seeder;

class DeliveryHeaderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DeliveryHeader::create([
            'title' => 'Judul delivery header',
            'quote' => 'Space untuk kalimat promo halaman delivery',
            'keyword' => 'Test keyword halaman delivery',
            'description' => 'Test deskripsi halaman delivery',
        ]);
    }
}
