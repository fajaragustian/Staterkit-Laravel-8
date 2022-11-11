<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Admin Seeder
        $admin = User::create([
            'name' => 'Admin Staterkits',
            'email' => 'admin@staterkit.com',
            'password' => bcrypt('password')
        ]);

        $role = Role::create(['name' => 'Admin']);

        $permissions = Permission::pluck('id', 'id')->all();

        $role->syncPermissions($permissions);

        $admin->assignRole([$role->id]);
        //User Seeder
        $user = User::create([
            'name' => 'User Staterkits',
            'email' => 'user@staterkit.com',
            'password' => bcrypt('password')
        ]);

        $role = Role::create(['name' => 'User']);

        $permissions = Permission::pluck('id', 'id')->all();

        $role->syncPermissions($permissions);

        $user->assignRole([$role->id]);
    }
}
