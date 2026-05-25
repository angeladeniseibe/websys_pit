<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Models\Staff;
use Illuminate\Http\Request;

class BranchController extends Controller
{
    public function index()
    {
        $branches = Branch::withCount('staff')->orderBy('branch_no')->get();
        return view('branches.index', compact('branches'));
    }

    public function create()
    {
        return view('branches.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'branch_no' => 'required|string|max:10|unique:branch,branch_no',
            'street'    => 'required|string|max:100',
            'area'      => 'nullable|string|max:100',
            'city'      => 'required|string|max:50',
            'postcode'  => 'nullable|string|max:20',
            'telephone' => 'nullable|string|max:20',
            'fax'       => 'nullable|string|max:20',
        ]);

        Branch::create($validated);

        return redirect()->route('branches.index')
            ->with('success', 'Branch created successfully.');
    }

    public function show(Branch $branch)
    {
        $branch->load('staff', 'staff.supervisor', 'staff.manager');
        return view('branches.show', compact('branch'));
    }

    public function edit(Branch $branch)
{
    $staff = Staff::orderBy('last_name')->get();
    return view('branches.edit', compact('branch', 'staff'));
}

    public function update(Request $request, Branch $branch)
    {
        $validated = $request->validate([
            'street'    => 'required|string|max:100',
            'area'      => 'nullable|string|max:100',
            'city'      => 'required|string|max:50',
            'postcode'  => 'nullable|string|max:20',
            'telephone' => 'nullable|string|max:20',
            'fax'       => 'nullable|string|max:20',
        ]);

        $branch->update($validated);

        return redirect()->route('branches.index')
            ->with('success', 'Branch updated successfully.');
    }

    public function destroy(Branch $branch)
    {
        $branch->delete();

        return redirect()->route('branches.index')
            ->with('success', 'Branch deleted successfully.');
    }
}