<?php

namespace App\Http\Controllers;

use App\Models\Staff;
use App\Models\Branch;
use App\Models\Supervisor;
use Illuminate\Http\Request;

class SupervisorDashboardController extends Controller
{
    private function staffId()
    {
        return auth()->user()->staff_id;
    }

    public function index()
    {
        $staffId    = $this->staffId();
        $branchNo   = auth()->user()->branch_no;
        $branch     = Branch::where('branch_no', $branchNo)->first();

        $myStaff    = Staff::where('supervisor_no', $staffId)->get();
        $staffCount = $myStaff->count();
        $secCount   = $myStaff->where('position', 'Secretary')->count();

        $supCount   = Supervisor::whereHas('staff', fn($q) => $q->where('branch_no', $branchNo))->count();

        return view('supervisor_role.dashboard', compact(
            'branch', 'branchNo', 'staffCount', 'supCount', 'secCount'
        ));
    }

    public function staff()
    {
        $staffId = $this->staffId();
        $staff   = Staff::where('supervisor_no', $staffId)->get();
        $staffId = $staffId;
        return view('supervisor_role.staff', compact('staff', 'staffId'));
    }

    public function supervisors()
    {
        $branchNo    = auth()->user()->branch_no;
        $supervisors = Supervisor::with('staff')
            ->whereHas('staff', fn($q) => $q->where('branch_no', $branchNo))
            ->get();
        return view('supervisor_role.supervisors', compact('supervisors', 'branchNo'));
    }
}