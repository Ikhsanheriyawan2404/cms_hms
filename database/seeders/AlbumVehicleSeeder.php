<?php

namespace Database\Seeders;

use App\Models\AlbumVehicle;
use Illuminate\Database\Seeder;

class AlbumVehicleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        AlbumVehicle::create([
            'name' => 'Colt Diesel Engkel',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        AlbumVehicle::create([
            'name' => 'Colt Diesel Double',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        AlbumVehicle::create([
            'name' => 'Van',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        AlbumVehicle::create([
            'name' => 'Dump Truck',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        AlbumVehicle::create([
            'name' => 'Tronton',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        AlbumVehicle::create([
            'name' => 'Fuso',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        AlbumVehicle::create([
            'name' => 'Forklift',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
