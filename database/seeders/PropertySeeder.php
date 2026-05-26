<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PropertySeeder extends Seeder
{
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('Property')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        DB::table('Property')->insert([
            [
                'property_id' => 'P001', 
                'type' => 'Flat', 
                'rent' => 1200.00, 
                'street' => '123 Main Street', 
                'area' => 'Downtown', 
                'city' => 'Metropolis', 
                'postcode' => '10001', 
                'status' => 'Available', 
                'owner_id' => 'O001', 
                'branch_no' => 'B001', 
                'staff_id' => 'ST001',
                'date_withdrawn' => null
            ],
            [
                'property_id' => 'P002', 
                'type' => 'House', 
                'rent' => 1800.00, 
                'street' => '456 Oak Avenue', 
                'area' => 'Uptown', 
                'city' => 'Metropolis', 
                'postcode' => '10002', 
                'status' => 'Available', 
                'owner_id' => 'O002', 
                'branch_no' => 'B002', 
                'staff_id' => 'ST002',
                'date_withdrawn' => null
            ],
        ]);
    }
}