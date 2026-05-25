<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OwnerController extends Controller
{
public function index()
{
    // Try to fetch from the live PostgreSQL Database first
    try {
        $owners = \DB::table('Owner')->get();
    } catch (\Exception $e) {
        // If your PostgreSQL server isn't running or migrated yet, catch the error so it won't crash
        $owners = collect([]);
    }

    // FALLBACK FOR TESTING: If the DB is empty or fails, use temporary arrays so your view doesn't break
    if ($owners->isEmpty()) {
        $owners = collect([
            (object)['owner_id' => 'O001', 'full_name' => 'John Anderson', 'address' => '12 Elm Street', 'phone' => '555-4001'],
            (object)['owner_id' => 'O002', 'full_name' => 'Mary Johnson', 'address' => '34 Oak Street', 'phone' => '555-4002']
        ]);
    }

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
public function edit($id)
{
    $owner = \DB::table('Owner')
        ->where('owner_id', $id)
        ->first();

    return view('owners.create', compact('owner'));
}

public function update(Request $request, $id)
{
    \DB::table('Owner')
        ->where('owner_id', $id)
        ->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
        ]);

    return redirect()->route('owners.index')
        ->with('success', 'Owner updated successfully!');
}

public function destroy($id)
{
    \DB::table('Owner')
        ->where('owner_id', $id)
        ->delete();

    return redirect()->route('owners.index')
        ->with('success', 'Owner deleted successfully!');
}
}
