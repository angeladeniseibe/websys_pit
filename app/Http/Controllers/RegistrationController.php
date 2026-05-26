<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Registration;
use App\Models\Client;
use App\Models\Branch;
use App\Models\Staff;

class RegistrationController extends Controller
{
    // Show all registrations (UPDATED)
    public function index(Request $request)
    {
        $search = $request->input('search');

        $registrations = Registration::with('client')
            ->when($search, function ($query) use ($search) {
                $query->whereHas('client', function ($q) use ($search) {
                    $q->where('first_name', 'like', "%{$search}%")
                      ->orWhere('last_name', 'like', "%{$search}%")
                      ->orWhere('phone', 'like', "%{$search}%");
                });
            })
            ->orderBy('client_id', 'desc')
            ->paginate(10);

        return view('registrations.index', compact('registrations', 'search'));
    }

    // Show create registration form
  public function create()
{
    $clients = Client::all();
    $branches = Branch::orderBy('branch_no')->get();

    return view('registrations.create', compact('clients', 'branches'));
}

    // Store new registration (staff_id added)
    public function store(Request $request)
    {
        $request->validate([
            'client_id' => 'required|exists:clients,client_id',
            'staff_id' => 'required',   // <-- VALIDATED
            'branch_no' => 'required|exists:branch,branch_no',
            'date_registered' => 'required|date',
            'preferred_property_type' => 'nullable',
            'max_rent' => 'nullable|numeric',
            'comments' => 'nullable',
        ]);

        Registration::create([
            'client_id' => $request->client_id,
            'staff_id' => $request->staff_id,   // <-- INCLUDED IN CREATE
            'branch_no' => $request->branch_no,
            'date_registered' => $request->date_registered,
            'preferred_property_type' => $request->preferred_property_type,
            'max_rent' => $request->max_rent,
            'comments' => $request->comments,
        ]);

        return redirect()->route('registrations.index')
                         ->with('success', 'Registration created successfully!');
    }

        public function edit($id)
    {
        $registration = Registration::findOrFail($id);

        $clients = Client::all();
        $branches = Branch::orderBy('branch_no')->get();

       $staff = [];

    if ($registration->branch_no) {
        $staff = Staff::where('branch_no', $registration->branch_no)
                    ->orderBy('last_name')
                    ->get();
        }

        return view('registrations.edit', compact(
            'registration',
            'clients',
            'branches',
            'staff'
        ));
    }
}