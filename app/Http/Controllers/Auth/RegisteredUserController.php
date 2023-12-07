<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
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
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'cus_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'cus_phone' => ['required', 'string', 'max:255','regex:/^0\d{9}$/', 'unique:users'],
            'cus_dob' => ['required', 'date', 'max:255','before_or_equal:today'],
            'cus_gender' => ['required', 'string', 'max:255'],

        ]);

        $user = User::create([
            'cus_name' => $request->cus_name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'cus_phone' => $request->cus_phone,
            'cus_dob' => $request->cus_dob,
            'cus_gender' => $request->cus_gender,
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
