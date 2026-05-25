<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Http\Request;

class PropertyController extends Controller
{
public function index()
{
    // Mock data
    $properties = collect([
        (object)['name' => 'Sunset Apartment', 'branch' => (object)['name' => 'North Branch'], 'staff' => (object)['name' => 'Ana Macaraeg']],
        (object)['name' => 'Garden Villa', 'branch' => (object)['name' => 'South Branch'], 'staff' => (object)['name' => 'Ramon Abad']],
    ]);
    
    // Pass 'properties' so the view uses $properties
    return view('properties.index', compact('properties'));
}
    
}