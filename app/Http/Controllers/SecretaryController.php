<?php

namespace App\Http\Controllers;

use App\Models\Secretary;
use App\Models\Staff;
use App\Models\Supervisor;
use Illuminate\Http\Request;

class SecretaryController extends Controller
{
    public function index()
    {
        $secretaries = Secretary::with('staff')->get();
        return view('secretaries.index', compact('secretaries'));
    }

    public function create()
    {
        $availableSecretaries = Staff::where('position', 'Secretary')
            ->whereNotIn('staff_id', Secretary::pluck('staff_id'))
            ->get();

        $supervisors = Supervisor::with('staff')->get();

        return view('secretaries.create', compact('availableSecretaries', 'supervisors'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'staff_id'      => [
                'required',
                'exists:staff,staff_id',
                'unique:secretary,staff_id',
                function ($attribute, $value, $fail) {
                    $staff = Staff::find($value);
                    if (!$staff || $staff->position !== 'Secretary') {
                        $fail('The selected staff member does not have position = Secretary.');
                    }
                }
            ],
            'supervisor_no' => 'required|exists:supervisor,staff_id',
            'typing_speed'  => 'required|integer|min:1|max:300',
        ]);

        Secretary::create($validated);

        return redirect()->route('secretaries.index')
                         ->with('success', 'Secretary record added successfully.');
    }

    public function edit(string $staff_id)
    {
        $secretary = Secretary::with('staff')->findOrFail($staff_id);

        $supervisors = Supervisor::with('staff')->get();

        return view('secretaries.edit', compact('secretary', 'supervisors'));
    }

    public function update(Request $request, string $staff_id)
    {
        $secretary = Secretary::findOrFail($staff_id);

        $validated = $request->validate([
            'supervisor_no' => 'required|exists:supervisor,staff_id',
            'typing_speed'  => 'required|integer|min:1|max:300',
        ]);

        $secretary->update($validated);

        return redirect()->route('secretaries.index')
                         ->with('success', 'Secretary record updated successfully.');
    }

    public function destroy(string $staff_id)
    {
        $secretary = Secretary::findOrFail($staff_id);
        $secretary->delete();

        return redirect()->route('secretaries.index')
                         ->with('success', 'Secretary record removed successfully.');
    }
}