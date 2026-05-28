<?php

namespace App\Http\Controllers;

use App\Models\Lease;
use App\Models\Property;
use App\Models\Client;
use Illuminate\Http\Request;

class LeaseController extends Controller
{
    public function index(Request $request)
    {
        $query = Lease::latest();

        if ($request->filled('search')) {
            $query->where(function ($q) use ($request) {
                $q->where('tenant_name', 'like', '%' . $request->search . '%')
                  ->orWhere('property_id', 'like', '%' . $request->search . '%');
            });
        }

        $leases = $query->get();

        return view('leases.index', compact('leases'));
    }

    public function create()
    {
        $clients    = Client::orderBy('first_name')->get();
        $properties = Property::orderBy('property_id')->get();

        return view('leases.create', compact('clients', 'properties'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'client_id'      => 'required',
            'property_id'    => 'required|string',
            'rent'           => 'required|numeric',
            'deposit'        => 'required|numeric',
            'payment_method' => 'required|string',
            'start_date'     => 'required|date',
            'end_date'       => 'required|date',
        ]);

        // Resolve client full name from client_id
        $client = Client::find($request->client_id);

        Lease::create([
            'tenant_name'    => $client ? $client->first_name . ' ' . $client->last_name : $request->client_id,
            'property_id'    => $request->property_id,
            'rent'           => $request->rent,
            'deposit'        => $request->deposit,
            'payment_method' => $request->payment_method,
            'start_date'     => $request->start_date,
            'end_date'       => $request->end_date,
        ]);

        return redirect()->route('leases.index')
                         ->with('success', 'Lease created successfully.');
    }
}               