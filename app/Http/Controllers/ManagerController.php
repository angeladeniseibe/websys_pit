<?php

namespace App\Http\Controllers;

use App\Models\Manager;
use App\Models\Staff;
use Illuminate\Http\Request;

class ManagerController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        if ($user->isAdmin()) {
            $managers = Manager::with('staff')->get();
        } else {
            $managers = Manager::with('staff')
                ->whereHas('staff', function ($query) use ($user) {
                    $query->where('branch_no', $user->branch_no);
                })
                ->get();
        }

        return view('managers.index', compact('managers'));
    }

    public function create()
    {
        if (!auth()->user()->isAdmin()) {
            abort(403, 'Unauthorized');
        }

        $availableManagers = Staff::where('position', 'Manager')
            ->whereNotIn('staff_id', Manager::pluck('staff_id'))
            ->get();

        return view('managers.create', compact('availableManagers'));
    }

    public function store(Request $request)
    {
        if (!auth()->user()->isAdmin()) {
            abort(403, 'Unauthorized');
        }

        $validated = $request->validate([
            'staff_id'      => [
                'required',
                'exists:staff,staff_id',
                'unique:manager,staff_id',
                function ($attribute, $value, $fail) {
                    $staff = Staff::find($value);
                    if (!$staff || $staff->position !== 'Manager') {
                        $fail('The selected staff member does not have position = Manager.');
                    }
                }
            ],
            'date_start'    => 'required|date',
            'car_allowance' => 'required|numeric|min:0',
            'bonus_payment' => 'required|numeric|min:0',
        ]);

        Manager::create($validated);

        return redirect()->route('managers.index')
                         ->with('success', 'Manager record added successfully.');
    }

    public function edit(string $id)
    {
        if (!auth()->user()->isAdmin()) {
            abort(403, 'Unauthorized');
        }

        $manager = Manager::with('staff')->where('staff_id', $id)->firstOrFail();

        return view('managers.edit', compact('manager'));
    }

    public function update(Request $request, string $id)
    {
        if (!auth()->user()->isAdmin()) {
            abort(403, 'Unauthorized');
        }

        $manager = Manager::where('staff_id', $id)->firstOrFail();

        $validated = $request->validate([
            'date_start'    => 'required|date',
            'car_allowance' => 'required|numeric|min:0',
            'bonus_payment' => 'required|numeric|min:0',
        ]);

        $manager->update($validated);

        return redirect()->route('managers.index')
                         ->with('success', 'Manager record updated successfully.');
    }

    public function destroy(string $id)
    {
        if (!auth()->user()->isAdmin()) {
            abort(403, 'Unauthorized');
        }

        Manager::where('staff_id', $id)->firstOrFail()->delete();

        return redirect()->route('managers.index')
                         ->with('success', 'Manager record removed successfully.');
    }
}