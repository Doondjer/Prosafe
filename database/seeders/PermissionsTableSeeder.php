<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            'user-list',
            'user-create',
            'user-edit',
            'user-delete',
            'role-list',
            'role-create',
            'role-edit',
            'role-delete',
            'page-list',
            'page-create',
            'page-edit',
            'page-delete',
            'permission-list',
            'permission-create',
            'permission-edit',
            'permission-delete',
            'product-list',
            'product-create',
            'product-edit',
            'product-delete',
            'category-list',
            'category-create',
            'category-edit',
            'category-delete',
            'access-admin-area',
            'maintenance-up',
            'maintenance-down',
            'configuration-edit',
            'sitemap-generate',
        ];

        foreach ($data as $permission) {
            Permission::create(['name' => $permission]);
        }
    }
}
