<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $currentTab = $request->query('tab', 'overview');

        // --- Groupmates' Shared Summary Metrics ---
        $totalBranches = 11;
        $totalStaff = 72;
        $totalSupervisors = 10;
        $compliance = 100;

        // --- Your Module 1 Master Summary Metrics ---
        $totalProperties = 145;
        $totalOwners = 42;
        $activeRentals = 118;
        $occupancyRate = 81;

        // --- Exact Schema Mapping for Property Table Records ---
        $properties = [
            ['property_id' => 'PA014', 'owner_id' => 'CO45', 'owner_name' => 'Tina Murphy', 'street' => '2 Manor Road', 'area' => 'Hyndland', 'city' => 'Glasgow', 'postcode' => 'G12 8QQ', 'type' => 'Flat', 'rent' => 650, 'status' => 'Available', 'branch_no' => 'B001', 'staff_id' => 'ST007'],
            ['property_id' => 'PL122', 'owner_id' => 'CO87', 'owner_name' => 'SafeEstates Ltd', 'street' => '18 Tannahill St', 'area' => 'Paisley Center', 'city' => 'Paisley', 'postcode' => 'PA1 2HA', 'type' => 'House', 'rent' => 950, 'status' => 'Rented', 'branch_no' => 'B002', 'staff_id' => 'ST062'],
            ['property_id' => 'PG036', 'owner_id' => 'CO93', 'owner_name' => 'John Kay', 'street' => '6 Argyll St', 'area' => 'Shawlands', 'city' => 'Glasgow', 'postcode' => 'G41 3AT', 'type' => 'Flat', 'rent' => 450, 'status' => 'Available', 'branch_no' => 'B001', 'staff_id' => 'ST007'],
        ];

        // --- Exact Schema Mapping for Owner Table Records ---
        $owners = [
            ['owner_id' => 'CO45', 'firt_name' => 'Tina', 'last_name' => 'Murphy', 'address' => '12 Park Pl, Glasgow', 'phone' => '0141-943-1728'],
            ['owner_id' => 'CO87', 'firt_name' => 'SafeEstates', 'last_name' => 'Ltd', 'address' => '88 Main St, Edinburgh', 'phone' => '0131-447-3321'],
            ['owner_id' => 'CO93', 'firt_name' => 'John', 'last_name' => 'Kay', 'address' => '56 High St, Kilmarnock', 'phone' => '01563-524-119'],
        ];

        // --- Groupmates' Supervisor Array Content for Team Dashboard Tab ---
        $supervisors = [
            ['id' => 'ST007', 'name' => 'Ana Macaraeg', 'branch' => 'B001', 'count' => 6],
            ['id' => 'ST062', 'name' => 'Ramon Abad', 'branch' => 'B002', 'count' => 5],
            ['id' => 'ST063', 'name' => 'Corazon Tan', 'branch' => 'B003', 'count' => 5],
        ];

        return view('dashboard', compact(
            'currentTab',
            'totalBranches',
            'totalStaff',
            'totalSupervisors',
            'compliance',
            'totalProperties',
            'totalOwners',
            'activeRentals',
            'occupancyRate',
            'properties',
            'owners',
            'supervisors'
        ));
    }
}