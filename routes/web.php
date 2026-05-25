<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OwnerController;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\DashboardController;
use App\Http\Middleware\EnsureUserIsAdmin;

// --- Dashboard ---
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

// --- Public / Client Accessible Routes (Read-Only) ---
Route::get('/properties', [PropertyController::class, 'index'])->name('properties.index');
Route::get('/owners', [OwnerController::class, 'index'])->name('owners.index');

// --- Protected Administrative Routes (Write Actions for Admins Only) ---
Route::middleware([EnsureUserIsAdmin::class])->group(function () {

    // Property Management Actions
    Route::get('/properties/create', [PropertyController::class, 'create'])->name('properties.create');
    Route::post('/properties', [PropertyController::class, 'store'])->name('properties.store');
    Route::get('/properties/{id}/edit', [PropertyController::class, 'edit'])->name('properties.edit');
    Route::put('/properties/{id}', [PropertyController::class, 'update'])->name('properties.update');
    Route::delete('/properties/{id}', [PropertyController::class, 'destroy'])->name('properties.destroy');

    // Owner Management Actions
    Route::get('/owners/create', [OwnerController::class, 'create'])->name('owners.create');
    Route::post('/owners', [OwnerController::class, 'store'])->name('owners.store');
});

// --- Presentation Simulation Switchers ---
Route::get('/simulate/client', function () {
    session(['user_role' => 'client']);
    return redirect()->back()->with('success', 'Switched session to Read-Only Client mode.');
});

Route::get('/simulate/admin', function () {
    session(['user_role' => 'admin']);
    return redirect()->back()->with('success', 'Switched session to Administrator mode.');
});

// --- Placeholder Modules (Team Modules) ---
Route::get('/branches', function () { return "Branch module coming soon"; })->name('branches.index');
Route::get('/staff', function () { return "Staff module coming soon"; })->name('staff.index');
Route::get('/next-of-kin', function () { return "Next of Kin module coming soon"; })->name('next-of-kin.index');

Route::resource('owners', OwnerController::class);