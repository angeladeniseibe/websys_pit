<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OwnerSeeder extends Seeder
{
    public function run(): void
    {
        // Truncate existing data to prevent duplicate primary key errors if re-run
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('Owner')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        // Inserting the exact real dataset from your team files
        DB::table('Owner')->insert([
            ['owner_id' => 'O001', 'full_name' => 'John Doe', 'address' => '123 Main Street', 'phone' => '555-1001'],
            ['owner_id' => 'O002', 'full_name' => 'Jane Smith', 'address' => '456 Oak Avenue', 'phone' => '555-1002'],
            ['owner_id' => 'O003', 'full_name' => 'Robert Johnson', 'address' => '789 Pine Road', 'phone' => '555-1003'],
            // Add a few more rows from your text file here to give a realistic demo
        ]);
    }
}
