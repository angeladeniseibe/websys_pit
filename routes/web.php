<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OwnerController;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\DashboardController;

// 1. YOUR MODULES (These connect to your Controllers)
Route::get('/owners', [OwnerController::class, 'index'])->name('owners.index');
Route::get('/properties', [PropertyController::class, 'index'])->name('properties.index');

// 2. TEAM MODULES (These use closures so the app doesn't crash while they are unfinished)
Route::get('/dashboard', function () { return view('dashboard'); })->name('dashboard');
Route::get('/branches', function () { return "Branch module coming soon"; })->name('branches.index');
Route::get('/staff', function () { return "Staff module coming soon"; })->name('staff.index');
Route::get('/next-of-kin', function () { return "Next of Kin module coming soon"; })->name('next-of-kin.index');
// If it says 'use App\Http\Controllers\DashboardController' at the top:
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/owners', [OwnerController::class, 'index'])->name('owners.index');