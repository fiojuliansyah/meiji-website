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
            ['name' => 'Finance Approval', 'user_id' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Legal Approval', 'user_id' => 2, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Marketing Approval', 'user_id' => 3, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'CEO Approval', 'user_id' => 4, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'HR Approval', 'user_id' => 5, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Quality Control Approval', 'user_id' => 6, 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
