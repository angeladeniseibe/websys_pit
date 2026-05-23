<?php

namespace App\Http\Controllers;

use App\Models\Staff;
use App\Models\Branch;
use App\Models\Manager;
use App\Models\Supervisor;
use App\Models\NextOfKin;
use Illuminate\Http\Request;

class ManagerDashboardController extends Controller
{
    private function branchNo()
    {
        return auth()->user()->branch_no;
    }

    public function index()
    {
        $branchNo   = $this->branchNo();
        $branch     = Branch::where('branch_no', $branchNo)->first();
        $staffCount = Staff::where('branch_no', $branchNo)->count();
        $supCount   = Staff::where('branch_no', $branchNo)
                           ->where('position', 'Supervisor')->count();
        $mgrCount   = Staff::where('branch_no', $branchNo)
                           ->where('position', 'Manager')->count();
        $secCount   = Staff::where('branch_no', $branchNo)
                           ->where('position', 'Secretary')->count();

        return view('manager_role.dashboard', compact(
            'branch', 'staffCount', 'supCount', 'mgrCount', 'secCount'
        ));
    }

    public function staff()
    {
        $branchNo = $this->branchNo();
        $staff    = Staff::where('branch_no', $branchNo)->get();
        return view('manager_role.staff', compact('staff', 'branchNo'));
    }

    public function supervisors()
    {
        $branchNo    = $this->branchNo();
        $supervisors = Supervisor::with('staff')
            ->whereHas('staff', fn($q) => $q->where('branch_no', $branchNo))
            ->get();
        return view('manager_role.supervisors', compact('supervisors', 'branchNo'));
    }

    public function nextofkin()
    {
        $branchNo  = $this->branchNo();
        $nextofkin = NextOfKin::whereHas('staff', fn($q) => $q->where('branch_no', $branchNo))
            ->with('staff')
            ->get();
        return view('manager_role.nextofkin', compact('nextofkin', 'branchNo'));
    }

    public function managers()
    {
        $branchNo = $this->branchNo();
        $managers = Manager::with('staff')
            ->whereHas('staff', fn($q) => $q->where('branch_no', $branchNo))
            ->get();
        return view('manager_role.managers', compact('managers', 'branchNo'));
    }
}