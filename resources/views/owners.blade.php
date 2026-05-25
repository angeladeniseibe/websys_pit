<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OwnerController extends Controller
{
    public function index()
    {
        // This expects a file at resources/views/owners.blade.php
        return view('owners'); 
    }
}