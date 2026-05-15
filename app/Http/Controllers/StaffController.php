<?php

namespace App\Http\Controllers;

use App\Models\Staff;
use App\Models\Branch;
use Illuminate\Http\Request;

class StaffController extends Controller
{
    public function index()
    {
        $staff = Staff::with('branch')->latest()->get();
        return view('staff.index', compact('staff'));
    }

    public function create()
    {
        $branches = Branch::where('status', 'active')->get();
        return view('staff.create', compact('branches'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'branch_id'  => 'required|exists:branches,id',
            'first_name' => 'required|string|max:255',
            'last_name'  => 'required|string|max:255',
            'email'      => 'required|email|unique:staff,email',
            'phone'      => 'nullable|string|max:50',
            'position'   => 'required|string|max:255',
            'role'       => 'required|in:admin,agent,support',
            'status'     => 'required|in:active,inactive',
            'hired_at'   => 'nullable|date',
        ]);

        Staff::create($validated);

        return redirect()->route('staff.index')
            ->with('success', 'Staff member added successfully.');
    }

    public function show(Staff $staff)
    {
        $staff->load('branch');
        return view('staff.show', compact('staff'));
    }

    public function edit(Staff $staff)
    {
        $branches = Branch::where('status', 'active')->get();
        return view('staff.edit', compact('staff', 'branches'));
    }

    public function update(Request $request, Staff $staff)
    {
        $validated = $request->validate([
            'branch_id'  => 'required|exists:branches,id',
            'first_name' => 'required|string|max:255',
            'last_name'  => 'required|string|max:255',
            'email'      => 'required|email|unique:staff,email,' . $staff->id,
            'phone'      => 'nullable|string|max:50',
            'position'   => 'required|string|max:255',
            'role'       => 'required|in:admin,agent,support',
            'status'     => 'required|in:active,inactive',
            'hired_at'   => 'nullable|date',
        ]);

        $staff->update($validated);

        return redirect()->route('staff.index')
            ->with('success', 'Staff member updated successfully.');
    }

    public function destroy(Staff $staff)
    {
        $staff->delete();

        return redirect()->route('staff.index')
            ->with('success', 'Staff member removed successfully.');
    }
}