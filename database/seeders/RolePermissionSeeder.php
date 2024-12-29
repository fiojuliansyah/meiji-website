<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;

class RolePermissionSeeder extends Seeder
{
    public function run()
    {
        // Define permission groups
        $permissions = [
            'Dashboard' => [
                'view-dashboard',
            ],
            'Homepages' => [
                'view-homepages',
                'edit-homepages',
            ],
            'Sliders' => [
                'list-sliders',
                'create-sliders',
                'edit-sliders',
                'delete-sliders',
            ],
            'Abouts' => [
                'list-abouts',
                'create-abouts',
                'edit-abouts',
                'delete-abouts',
            ],
            'Timelines' => [
                'list-timelines',
                'create-timelines',
                'edit-timelines',
                'delete-timelines',
            ],
            'News Categories' => [
                'list-news_categories',
                'create-news_categories',
                'edit-news_categories',
                'delete-news_categories',
            ],
            'News' => [
                'list-news',
                'create-news',
                'edit-news',
                'delete-news',
            ],
            'Categories' => [
                'list-categories',
                'create-categories',
                'edit-categories',
                'delete-categories',
            ],
            'Products' => [
                'list-products',
                'create-products',
                'edit-products',
                'delete-products',
            ],
            'R&D' => [
                'list-randds',
                'create-randds',
                'edit-randds',
                'delete-randds',
            ],
            'Activities' => [
                'list-activities',
                'create-activities',
                'edit-activities',
                'delete-activities',
            ],
            'FAQs' => [
                'list-faqs',
                'create-faqs',
                'edit-faqs',
                'delete-faqs',
            ],
            'Contacts' => [
                'view-contacts',
                'edit-contacts',
            ],
            'Pages' => [
                'list-pages',
                'create-pages',
                'edit-pages',
                'delete-pages',
            ],
            'Generals' => [
                'view-generals',
                'edit-generals',
            ],
            'Users' => [
                'list-users',
                'create-users',
                'edit-users',
                'delete-users',
            ],
            'Roles' => [
                'list-roles',
                'create-roles',
                'edit-roles',
                'delete-roles',
            ],
            'Languages' => [
                'list-languages',
                'create-languages',
                'edit-languages',
                'delete-languages',
                'manage-translations',
            ],
            'visitors' => [
                'view-visitors',
            ],
        ];

        // Create permissions
        foreach ($permissions as $group => $permissionList) {
            foreach ($permissionList as $permission) {
                Permission::firstOrCreate([
                    'name' => $permission,
                    'group' => $group,
                ]);
            }
        }

        // Create roles
        $adminRole = Role::firstOrCreate(['name' => 'Admin']);
        $userRole = Role::firstOrCreate(['name' => 'User']);

        // Assign all permissions to Admin
        $adminRole->syncPermissions(Permission::all());

        // Assign specific permissions to User
        $userPermissions = Permission::whereIn('name', ['list-user'])->get();
        $userRole->syncPermissions($userPermissions);

        // Create an admin user
        $admin = User::firstOrCreate(
            ['email' => 'admin@gmail.com'],
            [
                'name' => 'Admin',
                'password' => bcrypt('password'),
            ]
        );
        $admin->assignRole($adminRole);
    }
}
