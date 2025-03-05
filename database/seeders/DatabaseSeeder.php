<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $teachers = [
            [
                'name' => 'Test User 1',
                'email' => 'test1@example.com',
                'phone' => '0895428220544',
                'address' => 'sukarame',
                'gender' => 'male',
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Test User 2',
                'email' => 'test2@example.com',
                'phone' => '0895428220545',
                'address' => 'bandar lampung',
                'gender' => 'female',
                'status' => 'inactive',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Test User 3',
                'email' => 'test3@example.com',
                'phone' => '0895428220546',
                'address' => 'kemiling',
                'gender' => 'male',
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        foreach ($teachers as $teacher) {
            DB::table('teacher')->insert($teacher);
        }
    }
}
