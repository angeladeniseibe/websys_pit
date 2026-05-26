<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BranchController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\NextOfKinController;
use App\Http\Controllers\ManagerController;
use App\Http\Controllers\SupervisorController;
use App\Http\Controllers\SecretaryController;
use App\Http\Controllers\ManagerDashboardController;
use App\Http\Controllers\SupervisorDashboardController;
use App\Http\Controllers\SecretaryDashboardController;
use App\Http\Controllers\StaffDashboardController;
use App\Http\Controllers\InspectionController;
use App\Http\Controllers\LeaseController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\PropertyController;

/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::get('/register', function () {
    return view('auth.register');
})->name('register');

Route::get('/get-staff/{branch_no}', [StaffController::class, 'getStaffByBranch']);

/*
|--------------------------------------------------------------------------
| Authenticated Routes
|--------------------------------------------------------------------------
*/

Route::middleware(['auth'])->group(function () {

    // DASHBOARD
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // PROFILE
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // CLIENTS
    Route::get('/clients', [ClientController::class, 'index'])->name('clients.index');
    Route::get('/my-profile', [ClientController::class, 'myProfile'])->name('clients.my-profile');

    // CORE RESOURCES
    Route::resource('inspections', InspectionController::class);
    Route::resource('leases', LeaseController::class);
    Route::resource('properties', PropertyController::class);
    Route::resource('registrations', RegistrationController::class);

    // STAFF & BRANCH
    Route::resource('branches', BranchController::class);
    Route::resource('staff', StaffController::class);
    Route::resource('next-of-kin', NextOfKinController::class);
    Route::resource('managers', ManagerController::class);
    Route::resource('supervisors', SupervisorController::class);
    Route::resource('secretaries', SecretaryController::class);

    // SIMULATION HELPERS (admin/staff only)
    Route::get('/simulate/client', function () {
        if (auth()->user() && in_array(strtolower(auth()->user()->role), ['admin', 'staff'])) {
            session(['user_role' => 'client']);
            return redirect()->route('properties.index');
        }
        abort(403, 'Unauthorized action.');
    });

    Route::get('/simulate/admin', function () {
        if (auth()->user() && strtolower(auth()->user()->role) === 'admin') {
            session(['user_role' => 'admin']);
            return redirect()->route('properties.index');
        }
        abort(403, 'Unauthorized action.');
    });

    /*
    |--------------------------------------------------------------------------
    | Role-Based Routes
    |--------------------------------------------------------------------------
    */

    Route::middleware(['role:manager'])->prefix('manager')->name('manager.')->group(function () {
        Route::get('/dashboard',   [ManagerDashboardController::class, 'index'])->name('dashboard');
        Route::get('/staff',       [ManagerDashboardController::class, 'staff'])->name('staff');
        Route::get('/supervisors', [ManagerDashboardController::class, 'supervisors'])->name('supervisors');
        Route::get('/managers',    [ManagerDashboardController::class, 'managers'])->name('managers');
        Route::get('/nextofkin',   [ManagerDashboardController::class, 'nextofkin'])->name('nextofkin');
    });

    Route::middleware(['role:supervisor'])->prefix('supervisor')->name('supervisor.')->group(function () {
        Route::get('/dashboard',   [SupervisorDashboardController::class, 'index'])->name('dashboard');
        Route::get('/staff',       [SupervisorDashboardController::class, 'staff'])->name('staff');
        Route::get('/supervisors', [SupervisorDashboardController::class, 'supervisors'])->name('supervisors');
    });

    Route::middleware(['role:secretary'])->prefix('secretary')->name('secretary.')->group(function () {
        Route::get('/dashboard', [SecretaryDashboardController::class, 'index'])->name('dashboard');
        Route::get('/profile',   [SecretaryDashboardController::class, 'profile'])->name('profile');
    });

    Route::middleware(['role:staff'])->prefix('staffportal')->name('staff.')->group(function () {
        Route::get('/dashboard', [StaffDashboardController::class, 'index'])->name('dashboard');
        Route::get('/profile',   [StaffDashboardController::class, 'profile'])->name('profile');
    });

});

require __DIR__.'/auth.php';