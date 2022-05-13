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
            'title' => 'Ikhsan',
            'quote' => 'Ikhsan',
            'keyword' => 'Ikhsan',
            'description' => 'Ikhsan',
        ]);
    }
}
