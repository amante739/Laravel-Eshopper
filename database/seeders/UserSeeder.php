<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'first_name' => 'System',
            'last_name' => 'Admin',
            'username' => 'systemadmin',
            'phone' => '',
            'email' => 'admin@admin.com',
            'password' => Hash::make('12345678'),
            'is_admin' => 1,
            'super_user' => 1,
            'manage_supers' => 1,
        ]);
        $role = Role::create(['name' => 'Super Admin']);
        $permission = Permission::get(['name']);
        foreach($permission as $row)
        {
            $role->givePermissionTo($row->name);
        }
        $user->assignRole($role);
    }
}
