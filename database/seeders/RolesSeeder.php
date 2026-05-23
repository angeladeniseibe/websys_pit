<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class RolesSeeder extends Seeder
{
    public function run(): void
    {
        User::firstOrCreate(
            ['email' => 'admin@test.com'],
            [
                'name'     => 'Test Admin',
                'password' => bcrypt('password'),
                'role'     => 'admin',
            ]
        );

        User::firstOrCreate(
            ['email' => 'manager@test.com'],
            [
                'name'      => 'Test Manager',
                'password'  => bcrypt('password'),
                'role'      => 'manager',
                'branch_no' => 'B001',
            ]
        );

        User::firstOrCreate(
            ['email' => 'supervisor@test.com'],
            [
                'name'      => 'Test Supervisor',
                'password'  => bcrypt('password'),
                'role'      => 'supervisor',
                'branch_no' => 'B001',
                'staff_id'  => 'ST007',
            ]
        );

        User::firstOrCreate(
            ['email' => 'secretary@test.com'],
            [
                'name'      => 'Test Secretary',
                'password'  => bcrypt('password'),
                'role'      => 'secretary',
                'branch_no' => 'B001',
                'staff_id'  => 'ST003',
            ]
        );

        User::firstOrCreate(
            ['email' => 'staff@test.com'],
            [
                'name'      => 'Test Staff',
                'password'  => bcrypt('password'),
                'role'      => 'staff',
                'branch_no' => 'B001',
                'staff_id'  => 'ST001',
            ]
        );
    }
}