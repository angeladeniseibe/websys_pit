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
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\InspectionController;
use App\Http\Controllers\LeaseController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\RegistrationController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::get('/register', function () {
    return view('auth.register');
})->name('register');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');
/*
|--------------------------------------------------------------------------
| Inspection & Lease Routes
|--------------------------------------------------------------------------
*/

Route::resource('inspections', InspectionController::class);
Route::resource('leases', LeaseController::class);

/*
|--------------------------------------------------------------------------
| Registration Routes
|--------------------------------------------------------------------------
*/

Route::get('/registrations', [RegistrationController::class, 'index'])
    ->name('registrations.index');

Route::get('/registrations/create', [RegistrationController::class, 'create'])
    ->name('registrations.create');

Route::post('/registrations', [RegistrationController::class, 'store'])
    ->name('registrations.store');

/*
|--------------------------------------------------------------------------
| Client Routes
|--------------------------------------------------------------------------
*/

Route::get('/clients', [ClientController::class, 'index'])
    ->name('clients.index');

/*
|--------------------------------------------------------------------------
| Profile Routes
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');

    // BRANCH
    Route::resource('branches', BranchController::class);

    // STAFF
    Route::resource('staff', StaffController::class);
    Route::resource('next-of-kin', NextOfKinController::class);
    Route::resource('managers',    ManagerController::class);
    Route::resource('supervisors', SupervisorController::class);
    Route::resource('secretaries', SecretaryController::class);

    // MANAGER ROLE - SCOPED ROUTES
    Route::middleware(['role:manager'])->prefix('manager')->name('manager.')->group(function () {
        Route::get('/dashboard',  [ManagerDashboardController::class, 'index'])->name('dashboard');
        Route::get('/staff',      [ManagerDashboardController::class, 'staff'])->name('staff');
        Route::get('/supervisors',[ManagerDashboardController::class, 'supervisors'])->name('supervisors');
        Route::get('/managers',   [ManagerDashboardController::class, 'managers'])->name('managers');
        Route::get('/nextofkin',  [ManagerDashboardController::class, 'nextofkin'])->name('nextofkin');
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

});


Route::get('/registrations', [RegistrationController::class, 'index'])
    ->name('registrations.index');

Route::get('/registrations/create', [RegistrationController::class, 'create'])->name('registrations.create');
Route::post('/registrations', [RegistrationController::class, 'store'])->name('registrations.store');

Route::get('/clients', [ClientController::class, 'index'])->name('clients.index');

require __DIR__.'/auth.php';