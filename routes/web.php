<?php

use Illuminate\Support\Facades\Route;
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
})->name('dashboard');

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
});


Route::get('/registrations', [RegistrationController::class, 'index'])
    ->name('registrations.index');

Route::get('/registrations/create', [RegistrationController::class, 'create'])->name('registrations.create');
Route::post('/registrations', [RegistrationController::class, 'store'])->name('registrations.store');

Route::get('/clients', [ClientController::class, 'index'])->name('clients.index');

require __DIR__.'/auth.php';