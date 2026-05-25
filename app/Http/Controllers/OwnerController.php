<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OwnerController extends Controller
{
public function index()
{
    $owners = collect([
        (object)['name' => 'John Doe', 'email' => 'john@example.com', 'phone' => '09123456789'],
    ]);
    
    // We are passing 'owners' (the variable name in the view will be $owners)
    return view('owners.index', compact('owners'));
}
    public function create()
{
    return view('owners.create');
}
public function store(Request $request)
{
    // Validate and save logic goes here
    
    // Redirect back to the index of the module they were just in
    return redirect()->route('owners.index')->with('success', 'Owner added successfully!');
}
}
