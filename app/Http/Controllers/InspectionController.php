<?php

namespace App\Http\Controllers;

use App\Models\Inspection;
use Illuminate\Http\Request;

class InspectionController extends Controller
{
    public function index()
    {
        $inspections = Inspection::latest()->get();

        return view('inspections.index', compact('inspections'));
    }

    public function create()
    {
        return view('inspections.create');
    }

    public function store(Request $request)
    {
        Inspection::create($request->all());

        return redirect()->route('inspections.index')
                         ->with('success', 'Inspection added successfully');
    }
}