<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OwnerController;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\DashboardController;

// --- Dashboard ---
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

// --- Property Module ---
Route::prefix('properties')->group(function () {
    Route::get('/', [PropertyController::class, 'index'])->name('properties.index');
    Route::get('/create', [PropertyController::class, 'create'])->name('properties.create');
    Route::post('/', [PropertyController::class, 'store'])->name('properties.store');
});

// --- Owner Module ---
Route::prefix('owners')->group(function () {
    Route::get('/', [OwnerController::class, 'index'])->name('owners.index');
    Route::get('/create', [OwnerController::class, 'create'])->name('owners.create');
    Route::post('/', [OwnerController::class, 'store'])->name('owners.store');
});

// --- Placeholder Modules (Team Modules) ---
Route::get('/branches', function () { return "Branch module coming soon"; })->name('branches.index');
Route::get('/staff', function () { return "Staff module coming soon"; })->name('staff.index');
Route::get('/next-of-kin', function () { return "Next of Kin module coming soon"; })->name('next-of-kin.index');