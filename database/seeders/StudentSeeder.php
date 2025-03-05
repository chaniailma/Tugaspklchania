<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Query Builder
        DB::table('students')->insert([
                'name' => 'Test User 1',
                'email' => 'example@example.com',
                'phone' => '0895428220544',
                'class' => 6,
                'address' => 'sukarame',
                'gender' => 'male',
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now(),
        ]);
    }
}
