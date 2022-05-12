<?php

namespace Database\Seeders;

use App\Models\ServiceHeader;
use Illuminate\Database\Seeder;

class ServiceHeaderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ServiceHeader::create([
            'title' => 'Layanan kami',
            'quote' => 'Space untuk kalimat promo halaman Services',
            'keyword' => 'Tesy keyword halaman service',
            'description' => 'Test deskripsi service',
        ]);
    }
}
