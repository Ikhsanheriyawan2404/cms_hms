<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $superadmin = User::create([
            'name' => 'Super Admin',
            'email' => 'superadmin@role.test',
            'password' => bcrypt('admin'),
            'is_active' => '1',
        ]);

        $superadmin->assignRole('Superadmin');

        $author = User::create([
            'name' => 'Author',
            'email' => 'author@role.test',
            'password' => bcrypt('admin'),
            'is_active' => '1',
        ]);

        $author->assignRole('Author');

    }
}
