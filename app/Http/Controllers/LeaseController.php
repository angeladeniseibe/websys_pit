<?php

namespace App\Http\Controllers;

use App\Models\Lease;
use App\Models\Property;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class LeaseController extends Controller
{
    public function index()
    {
        $leases = Lease::latest()->get();

        return view('leases.index', compact('leases'));
    }

    public function create()
    {
        $properties = Property::all();
        return view('leases.create', ['properties' => $properties]);
    }

    public function store(Request $request)
    {
        Lease::create($request->all());

        return redirect()->route('leases.index')
                         ->with('success', 'Lease created successfully');
    }
}
