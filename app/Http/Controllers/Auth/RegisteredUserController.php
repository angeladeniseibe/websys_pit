<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Client; // ✅ ADDED
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     */
 public function store(Request $request): RedirectResponse
{
    $request->validate([
        'first_name' => ['required', 'string', 'max:255'],
        'last_name'  => ['required', 'string', 'max:255'],
        'email'      => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:users,email'],
        'password'   => ['required', 'confirmed', Rules\Password::defaults()],
        'address'    => ['required', 'string', 'max:255'],
        'phone'      => ['required', 'string', 'max:25'],
    ]);

    // 1. Create USER (ONLY AUTH DATA)
    $user = User::create([
        'name'     => $request->first_name . ' ' . $request->last_name,
        'email'    => $request->email,
        'password' => Hash::make($request->password),
    ]);

    // 2. Create CLIENT (PROFILE DATA - MUST MATCH MIGRATION)
    Client::create([
        'user_id'    => $user->id,
        'first_name' => $request->first_name,
        'last_name'  => $request->last_name,
        'address'    => $request->address,
        'phone'      => $request->phone,
        'email'      => $request->email, // optional but OK since nullable
    ]);

    event(new Registered($user));

    Auth::login($user);

    return redirect()->route('dashboard');
}}
