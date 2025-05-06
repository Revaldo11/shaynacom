<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Function to create permissions
        $permissions = [
            'manage statistics',
            'manage products',
            'manage principles',
            'manage testimonials',
            'manage clients',
            'manage teams',
            'manage abouts',
            'manage appointments',
            'manage hero sections',
        ];

        // Maping permissions to roles
        foreach ($permissions as $permission) {
            Permission::firstOrCreate(
                [
                    'name' => $permission,
                ]
            );
        }

        $superAdminRole = Role::firstOrCreate([
            'name' => 'super_admin',
        ]);

        $operationalRole = Role::firstOrCreate([
            'name' => 'operational',
        ]);

        $operationalRole->givePermissionTo([
            'manage clients',
            'manage teams',
        ]);

        $user = User::create([
            'name' => 'Super Admin',
            'email' => 'superadmin@gmail.com',
            'password' => bcrypt('password'),
        ]);

        $user->assignRole($superAdminRole);
    }
}
