<?php

namespace App\Http\Controllers;

use App\Models\NextOfKin;
use App\Models\Staff;
use Illuminate\Http\Request;

class NextOfKinController extends Controller
{
    public function index()
    {
        $nextOfKin = NextOfKin::with('staff')->get();
        return view('next-of-kin.index', compact('nextOfKin'));
    }

    public function create()
    {
        $existingStaffIds = NextOfKin::pluck('staff_id');
        $staff = Staff::whereNotIn('staff_id', $existingStaffIds)->get();
        return view('next-of-kin.create', compact('staff'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'staff_id'     => 'required|string|max:10|exists:staff,staff_id|unique:next_of_kin,staff_id',
            'full_name'    => 'required|string|max:100',
            'relationship' => 'required|string|max:50',
            'address'      => 'required|string',
            'telephone'    => 'nullable|string|max:20',
        ]);

        NextOfKin::create($validated);
        return redirect()->route('next-of-kin.index')->with('success', 'Next of kin added successfully.');
    }

    public function show(string $id)
    {
        $kin = NextOfKin::with('staff')->where('kin_id', $id)->firstOrFail(); // ← fixed
        return view('next-of-kin.show', compact('kin'));
    }

    public function edit(string $id)
    {
        $kin = NextOfKin::with('staff')->where('kin_id', $id)->firstOrFail(); // ← fixed
        return view('next-of-kin.edit', compact('kin'));
    }

    public function update(Request $request, string $id)
    {
        $kin = NextOfKin::where('kin_id', $id)->firstOrFail(); // ← fixed

        $validated = $request->validate([
            'full_name'    => 'required|string|max:100',
            'relationship' => 'required|string|max:50',
            'address'      => 'required|string',
            'telephone'    => 'nullable|string|max:20',
        ]);

        $kin->update($validated);
        return redirect()->route('next-of-kin.index')->with('success', 'Next of kin updated successfully.');
    }

    public function destroy(string $id)
    {
        NextOfKin::where('kin_id', $id)->firstOrFail()->delete(); // ← fixed
        return redirect()->route('next-of-kin.index')->with('success', 'Next of kin removed successfully.');
    }
}