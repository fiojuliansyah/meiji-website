<?php

namespace Database\Seeders;

use App\Models\ApprovalType;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ApprovalTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        ApprovalType::insert([
            ['name' => 'Material Approval', 'user_id' => 2, 'approval_module_id' => 1, 'is_edit' => 1, 'is_preview' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Material Approval', 'user_id' => 3, 'approval_module_id' => 1, 'is_edit' => 1, 'is_preview' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Material Approval', 'user_id' => 4, 'approval_module_id' => 1, 'is_edit' => 1, 'is_preview' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Material Approval', 'user_id' => 5, 'approval_module_id' => 1, 'is_edit' => 1, 'is_preview' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Material Approval', 'user_id' => 6, 'approval_module_id' => 1, 'is_edit' => 1, 'is_preview' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Material Approval', 'user_id' => 7, 'approval_module_id' => 1, 'is_edit' => 1, 'is_preview' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Legal Approval', 'user_id' => 8, 'approval_module_id' => 1, 'is_edit' => 1, 'is_preview' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Legal Approval', 'user_id' => 9, 'approval_module_id' => 1, 'is_edit' => 1, 'is_preview' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Language Approval', 'user_id' => 10, 'approval_module_id' => 1, 'is_edit' => 1, 'is_preview' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Layouts & Design Approval', 'user_id' => 11, 'approval_module_id' => 1, 'is_edit' => 1, 'is_preview' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Layouts & Design Approval', 'user_id' => 12, 'approval_module_id' => 1, 'is_edit' => 1, 'is_preview' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Layouts & Design Approval', 'user_id' => 13, 'approval_module_id' => 1, 'is_edit' => 1, 'is_preview' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Verification', 'user_id' => 14, 'approval_module_id' => 1, 'is_edit' => 1, 'is_preview' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Verification', 'user_id' => 15, 'approval_module_id' => 1, 'is_edit' => 1, 'is_preview' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Verification', 'user_id' => 16, 'approval_module_id' => 1, 'is_edit' => 1, 'is_preview' => 1, 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
