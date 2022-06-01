<?php

namespace Database\Seeders;

use App\Models\VehicleHeader;
use Illuminate\Database\Seeder;

class VehicleHeaderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        VehicleHeader::create([
            'title' => 'Judul vehicle header',
            'quote' => 'Space untuk kalimat promo halaman vehicle',
            'keyword' => 'Test keyword halaman vehicle',
            'description' => 'Test deskripsi halaman vehicle',
        ]);
    }
}
