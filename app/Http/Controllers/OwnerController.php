<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OwnerController extends Controller
{
    public function index()
    {
        // Mock data
        $owners = collect([
            (object)['name' => 'John Doe', 'email' => 'john@example.com', 'phone' => '09123456789'],
            (object)['name' => 'Jane Smith', 'email' => 'jane@example.com', 'phone' => '09987654321'],
        ]);
        
        // Pass '$owners' to the view
        return view('owners.index', compact('owners'));
    }
}