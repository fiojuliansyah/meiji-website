<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;

class RolePermissionSeeder extends Seeder
{
    public function run()
    {
        // Define permission groups
        $permissions = [
            'Dashboard' => [
                'view-dashboard',
            ],
            'Approvals' => [
                'list-approvals',
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

        DB::table('users')->insert([
            [
                'name' => 'Dody Irawan',
                'email' => 'dody.irawan@meiji.co.id',
                'password' => Hash::make('password'), // Password: password
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Maya Puspitasari',
                'email' => 'maya.puspitasari@meiji.co.id',
                'password' => Hash::make('password'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Adam Aulia Bhagaskara',
                'email' => 'adam.aulia@meiji.co.id',
                'password' => Hash::make('password'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Muhammad Rifki Hariansyah',
                'email' => 'rifki.hariansyah@meiji.co.id',
                'password' => Hash::make('password'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Galih Ario Seno',
                'email' => 'galih.ario@meiji.co.id',
                'password' => Hash::make('password'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Muhammad Faisal Arifin',
                'email' => 'faisal.arifin@meiji.co.id',
                'password' => Hash::make('password'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Nur Jihad Alhaq',
                'email' => 'nj_alhaq@meiji.co.id',
                'password' => Hash::make('password'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Yeni Pratiwi Puspitasari',
                'email' => 'yeni.pratiwi@meiji.co.id',
                'password' => Hash::make('password'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Gita Siwi Pribadi',
                'email' => 'gita.siwi@meiji.co.id',
                'password' => Hash::make('password'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Debbie Elsiandani Wirastika',
                'email' => 'debbie.elsiandani@meiji.co.id',
                'password' => Hash::make('password'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Agung Wibisono Wisnu Ajie',
                'email' => 'agung@meiji.co.id',
                'password' => Hash::make('password'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Wawan Fauzi',
                'email' => 'wawan.fauzi@meiji.co.id',
                'password' => Hash::make('password'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'mubarok',
                'email' => 'mubarok@meiji.co.id',
                'password' => Hash::make('password'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Firmansyah',
                'email' => 'firmansyah@meiji.co.id',
                'password' => Hash::make('password'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Budi Raharjo',
                'email' => 'budi.rahardjo@meiji.co.id',
                'password' => Hash::make('password'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
