<?php

namespace Database\Seeders;

use App\Models\Homepage;
use Illuminate\Database\Seeder;

class HomepageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Homepage::create([
            'title' => 'PT Harum Manis Logistik',
            'sub_title' => 'Sebuah Perusahaan Logistik'
        ]);
    }
}
