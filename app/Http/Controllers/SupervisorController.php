<?php

namespace App\Http\Controllers;

use App\Models\Supervisor;
use App\Models\Staff;
use App\Models\Manager;
use Illuminate\Http\Request;

class SupervisorController extends Controller
{
    public function index()
    {
        // load both staff info and manager info for display
        $supervisors = Supervisor::with(['staff', 'manager'])->get();
        return view('supervisors.index', compact('supervisors'));
    }

    public function create()
    {
        $availableSupervisors = Staff::where('position', 'Supervisor')
            ->whereNotIn('staff_id', Supervisor::pluck('staff_id'))
            ->get();

        $managers = Manager::with('staff')->get();

        return view('supervisors.create', compact('availableSupervisors', 'managers'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'staff_id' => [
                'required',
                'exists:staff,staff_id',
                'unique:supervisor,staff_id',
                function ($attribute, $value, $fail) {
                    $staff = Staff::find($value);
                    if (!$staff || $staff->position !== 'Supervisor') {
                        $fail('The selected staff member does not have position = Supervisor.');
                    }
                }
            ],
            'manager_no' => [
                'required',
                'exists:manager,staff_id',
                // same-branch check: avoids hitting the DB trigger with an ugly exception
                function ($attribute, $value, $fail) use ($request) {
                    $supervisor = Staff::find($request->staff_id);
                    $manager    = Staff::find($value);

                    if ($supervisor && $manager && $supervisor->branch_no !== $manager->branch_no) {
                        $fail("The manager must belong to the same branch as the supervisor (Branch {$supervisor->branch_no}).");
                    }
                }
            ],
            'responsibility' => 'required|string|max:500',
        ]);

        Supervisor::create($validated);

        return redirect()->route('supervisors.index')
                         ->with('success', 'Supervisor record added successfully.');
    }

    public function show(Supervisor $supervisor)
    {
        $supervisor->load('staff', 'manager');
        return view('supervisors.show', compact('supervisor'));
    }

    public function edit(Supervisor $supervisor)
    {
        // only managers from the same branch as this supervisor
        $managers = Manager::with('staff')
            ->whereHas('staff', function ($q) use ($supervisor) {
                $q->where('branch_no', $supervisor->staff->branch_no);
            })
            ->get();

        return view('supervisors.edit', compact('supervisor', 'managers'));
    }

    public function update(Request $request, Supervisor $supervisor)
    {
        $validated = $request->validate([
            'manager_no' => [
                'required',
                'exists:manager,staff_id',
                function ($attribute, $value, $fail) use ($supervisor) {
                    $manager = Staff::find($value);

                    if ($manager && $manager->branch_no !== $supervisor->staff->branch_no) {
                        $fail("The manager must belong to the same branch as the supervisor (Branch {$supervisor->staff->branch_no}).");
                    }
                }
            ],
            'responsibility' => 'required|string|max:500',
        ]);

        $supervisor->update($validated);

        return redirect()->route('supervisors.index')
                         ->with('success', 'Supervisor record updated successfully.');
    }

    public function destroy(Supervisor $supervisor)
    {
        $supervisor->delete();

        return redirect()->route('supervisors.index')
                         ->with('success', 'Supervisor record removed successfully.');
    }
}