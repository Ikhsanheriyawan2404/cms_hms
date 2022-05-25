<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $superadmin = Role::create([
            'name' => 'Superadmin',
            'guard_name' => 'web'
        ]);

        $author = Role::create([
            'name' => 'Author',
            'guard_name' => 'web'
        ]);

        $superadmin->givePermissionTo([
            'user-list',
            'user-create',
            'user-edit',
            'user-delete',
            'role-list',
            'role-create',
            'role-edit',
            'role-delete',
            'homepage-crud',
            'vehicle-crud',
            'about-crud',
            'delivery-crud',
            'service-crud',
            'customer-crud',
            'contact-crud',
            'vehicle-crud',
            'blog-list',
            'blog-create',
            'blog-edit',
            'blog-delete',
            'category-crud',
            'comment-crud',
        ]);

        $author->givePermissionTo([
            'blog-list',
            'blog-create',
            'blog-edit',
            'blog-delete',
        ]);
    }
}
