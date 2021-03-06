<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(1)->create();
        $this->call([
            PermissionSeeder::class,
            RoleSeeder::class,
            UserSeeder::class,
            AboutHeaderSeeder::class,
            DeliveryHeaderSeeder::class,
            ServiceHeaderSeeder::class,
            VehicleHeaderSeeder::class,
            AboutSeeder::class,
            HomepageSeeder::class,
            CategorySeeder::class,
            PostHeaderSeeder::class,
            AlbumVehicleSeeder::class,
        ]);
    }
}
