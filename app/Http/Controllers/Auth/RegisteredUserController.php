<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
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
            'firstname' => ['required', 'string', 'max:50'],
            'lastname' => ['required', 'string', 'max:50'],
            'pseudonym' => ['nullable', 'string', 'max:50'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
            'address' => ['required', 'string', 'max:255'],
            'zipcode' => ['required', 'string', 'max:5'],
            'town' => ['required', 'string', 'max:255'],
            'picture' => ['nullable', 'string', 'max:255'],
            'birthday' => ['required', 'date'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'pseudonym' => $request->pseudonym,
            'email' => $request->email,
            'address' => $request->address,
            'zipcode' => $request->zipcode,
            'town' => $request->town,
            'picture' => $request->picture,
            'birthday' => $request->birthday,
            'password' => Hash::make($request->password),
            'id_role' => 1,
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect()->intended('/');
    }
}