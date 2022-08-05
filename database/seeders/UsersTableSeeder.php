<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'Zeljko Milosevic',
            'email' => 'www@www.www',
            'password' => Hash::make('xxxxxx')
        ]);
        $superAdmin = User::create([
            'name' => 'pedja',
            'email' => 'pusic.antonije@gmail.com',
            'password' => Hash::make('xxxxxx')
        ]);

        $role = Role::whereName('admin')->first();
        $superAdminRole = Role::whereName('super_admin')->first();

        $permissions = Permission::pluck('id', 'id')->all();

        $role->syncPermissions($permissions);

        $user->assignRole([$role->id]);
        $superAdmin->assignRole([$superAdminRole->id]);
    }
}
