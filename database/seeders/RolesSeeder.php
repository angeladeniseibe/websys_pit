<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class RolesSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@test.com'],
            [
                'name'     => 'Dreamhome Admin',
                'password' => ('12345678'),
                'role'     => 'admin',
            ]
        );

        User::updateOrCreate(
            ['email' => 'manager@test.com'],
            [
                'name'      => 'Jose Reyes Manager',
                'password'  => ('12345678'),
                'role'      => 'manager',
                'branch_no' => 'B001',
            ]
        );

        User::updateOrCreate(
            ['email' => 'supervisor@test.com'],
            [
                'name'      => 'Anna Macaraeg Supervisor',
                'password'  => ('12345678'),
                'role'      => 'supervisor',
                'branch_no' => 'B001',
                'staff_id'  => 'ST007',
            ]
        );

        User::updateOrCreate(
            ['email' => 'secretary@test.com'],
            [
                'name'      => 'Carmen Ilustre Secretary',
                'password'  => ('12345678'),
                'role'      => 'secretary',
                'branch_no' => 'B001',
                'staff_id'  => 'ST003',
            ]
        );

        User::updateOrCreate(
            ['email' => 'staff@test.com'],
            [
                'name'      => 'Alicia Magno Staff',
                'password'  => ('12345678'),
                'role'      => 'staff',
                'branch_no' => 'B001',
                'staff_id'  => 'ST001',
            ]
        );
    }
}