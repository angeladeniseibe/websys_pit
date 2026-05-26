<?php

namespace App\Http\Controllers;

use App\Models\Staff;
use App\Models\Branch;

class SecretaryDashboardController extends Controller
{
    public function index()
    {
        $staffId  = auth()->user()->staff_id;
        $branchNo = auth()->user()->branch_no;
        $branch   = Branch::where('branch_no', $branchNo)->first();
        $staff    = Staff::where('staff_id', $staffId)->first();

        return view('staff_role.dashboard', compact('branch', 'branchNo', 'staff'));
    }

    public function profile()
    {
        $staffId  = auth()->user()->staff_id;
        $branchNo = auth()->user()->branch_no;
        $branch   = Branch::where('branch_no', $branchNo)->first();
        $staff    = Staff::where('staff_id', $staffId)->first();

        return view('staff_role.profile', compact('branch', 'branchNo', 'staff'));
    }
}