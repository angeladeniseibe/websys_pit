<?php

namespace App\Http\Controllers;

use App\Models\Lease;
use Illuminate\Http\Request;

class LeaseController extends Controller
{
    public function index()
    {
        $leases = Lease::latest()->get();

        return view('leases.index', compact('leases'));
    }

    public function create()
    {
        return view('leases.create');
    }

    public function store(Request $request)
    {
        Lease::create($request->all());

        return redirect()->route('leases.index')
                         ->with('success', 'Lease created successfully');
    }
}