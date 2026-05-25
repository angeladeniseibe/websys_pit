<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Http\Request;

class PropertyController extends Controller
{
public function index()
{
    // Mock data for the demo
    $properties = collect([
        (object)['name' => 'Sunset Apartment', 'branch' => (object)['name' => 'North Branch'], 'staff' => (object)['name' => 'Ana Macaraeg']],
        (object)['name' => 'Garden Villa', 'branch' => (object)['name' => 'South Branch'], 'staff' => (object)['name' => 'Ramon Abad']],
    ]);
    
    // The name inside compact() must be 'properties'
    return view('properties.index', compact('properties'));
}
    public function create()
{
    return view('properties.create');
}
public function store(Request $request)
{
    // Validate and save logic goes here
    
    // Redirect back to the index of the module they were just in
    return redirect()->route('properties.index')->with('success', 'Record added successfully!');
}
}