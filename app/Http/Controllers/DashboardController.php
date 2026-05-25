<?php

namespace App\Http\Controllers;

use App\Models\Property;
use App\Models\Owner;

class DashboardController extends Controller
{
public function index()
{
    // Use mock data instead of database models
    $totalProperties = 25; 
    $totalOwners = 12;
    $availableUnits = 5;

    return view('dashboard', compact('totalProperties', 'totalOwners', 'availableUnits'));
}
}