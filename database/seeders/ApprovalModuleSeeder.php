<?php

namespace Database\Seeders;

use App\Models\ApprovalModule;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ApprovalModuleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ApprovalModule::insert([
            ['name' => 'All Module', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Activity', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'News', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Page', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Product', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'R&D', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
