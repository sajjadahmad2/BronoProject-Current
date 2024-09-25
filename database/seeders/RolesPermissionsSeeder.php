<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Clear existing permissions and roles
        Permission::truncate();
        Role::truncate();

        $abilities = [
            'read',
            'write',
            'create',
            'delete',
        ];

        $permissions_by_role = [
            'superadministrator' => [
                'user management',
                'dashboard management',
                'settings management',
                'designer management',
                'property management',
            ],
            'company' => [
                'user management',
                'dashboard management',
                'settings management',
                'designer management',
                'property management',
            ],
            'user' => [
                'dashboard management',
                'designer management',
                'property management',
            ],
        ];

        // Create permissions
        foreach ($permissions_by_role as $permissions) {
            foreach ($permissions as $permission) {
                foreach ($abilities as $ability) {
                    // Use firstOrCreate to avoid duplicate permissions
                    Permission::firstOrCreate(['name' => $ability . ' ' . $permission]);
                }
            }
        }

        // Create roles and assign permissions
        foreach ($permissions_by_role as $role => $permissions) {
            $full_permissions_list = [];
            foreach ($abilities as $ability) {
                foreach ($permissions as $permission) {
                    $full_permissions_list[] = $ability . ' ' . $permission;
                }
            }
            // Use firstOrCreate to avoid duplicate roles
            $roleInstance = Role::firstOrCreate(['name' => $role]);
            $roleInstance->syncPermissions($full_permissions_list);
        }

        // Assign roles to users
        User::find(1)->assignRole('superadministrator');
        User::find(2)->assignRole('company');
        User::find(4)->assignRole('company');
    }
}
