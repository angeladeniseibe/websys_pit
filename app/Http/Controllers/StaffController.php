<?php

namespace App\Http\Controllers;

use App\Models\Staff;
use App\Models\Branch;
use Illuminate\Http\Request;

class StaffController extends Controller
{
    public function index()
    {
        $staff = Staff::with('branch')->orderBy('staff_id')->get();
        return view('staff.index', compact('staff'));
    }

    public function create()
    {
        $branches             = Branch::orderBy('branch_no')->get();
        $supervisorsWithSlots = Staff::where('position', 'Supervisor')
                                     ->orderBy('first_name')->get();
        $managers             = Staff::where('position', 'Manager')
                                     ->orderBy('first_name')->get();

        return view('staff.create', compact('branches', 'supervisorsWithSlots', 'managers'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'staff_id'      => 'required|string|max:10|unique:staff,staff_id',
            'branch_no'     => 'required|exists:branch,branch_no',
            'supervisor_no' => 'nullable|exists:staff,staff_id',
            'first_name'    => 'required|string|max:50',
            'last_name'     => 'required|string|max:50',
            'position'      => 'required|in:Manager,Supervisor,Secretary,Staff',
            'street'        => 'required|string|max:100',
            'city'          => 'required|string|max:50',
            'postcode'      => 'nullable|string|max:20',
            'telephone'     => 'nullable|string|max:20',
            'sex'           => 'nullable|in:M,F',
            'dob'           => 'required|date',
            'salary'        => 'required|numeric|min:0',
            'nin'           => 'required|string|max:20|unique:staff,nin',
            'date_joined'   => 'required|date',
        ]);

        Staff::create($validated);

        return redirect()->route('staff.index')
            ->with('success', 'Staff member added successfully.');
    }

    public function show(Staff $staff)
    {
        $staff->load('branch', 'supervisor', 'subordinates');
        return view('staff.show', compact('staff'));
    }

    public function edit(Staff $staff)
{
    $branches             = Branch::orderBy('branch_no')->get();
    $supervisorsWithSlots = Staff::where('position', 'Supervisor')
                                 ->where('staff_id', '!=', $staff->staff_id)
                                 ->orderBy('first_name')->get();
    $managers             = Staff::where('position', 'Manager')
                                 ->orderBy('first_name')->get();

    return view('staff.edit', compact('staff', 'branches', 'supervisorsWithSlots', 'managers'));
}

    public function update(Request $request, Staff $staff)
    {
        $validated = $request->validate([
            'branch_no'     => 'required|exists:branch,branch_no',
            'supervisor_no' => 'nullable|exists:staff,staff_id',
            'first_name'    => 'required|string|max:50',
            'last_name'     => 'required|string|max:50',
            'position'      => 'required|in:Manager,Supervisor,Secretary,Staff',
            'street'        => 'required|string|max:100',
            'city'          => 'required|string|max:50',
            'postcode'      => 'nullable|string|max:20',
            'telephone'     => 'nullable|string|max:20',
            'sex'           => 'nullable|in:M,F',
            'dob'           => 'required|date',
            'salary'        => 'required|numeric|min:0',
            'nin'           => 'required|string|max:20|unique:staff,nin,'
                               . $staff->staff_id . ',staff_id',
            'date_joined'   => 'required|date',
        ]);

        $staff->update($validated);

        return redirect()->route('staff.index')
            ->with('success', 'Staff member updated successfully.');
    }


    public function getStaffByBranch($branch_no)
    {
        $staff = Staff::where('branch_no', $branch_no)
                    ->orderBy('last_name')
                    ->get();

        return response()->json($staff);
    }
    public function destroy(Staff $staff)
    {
        $staff->delete();

        return redirect()->route('staff.index')
            ->with('success', 'Staff member removed successfully.');
    }
}