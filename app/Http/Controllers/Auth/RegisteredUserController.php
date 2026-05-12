<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Guru;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    public function create(): View
    {
        return view('auth.register');
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        // 🔥 CEK EMAIL ADA DI DATA GURU ATAU TIDAK
        $guru = \App\Models\Guru::where('email', $request->email)->first();

        if (!$guru) {
            throw \Illuminate\Validation\ValidationException::withMessages([
                'email' => 'Email tidak terdaftar di data guru',
            ]);
        }

        // 🔥 BUAT USER + HUBUNGKAN KE GURU
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'guru',
            'guru_id' => $guru->id,
        ]);

        event(new Registered($user));

        Auth::login($user);

        // 🔥 REDIRECT SESUAI ROLE
        if ($user->role == 'admin') {
            return redirect()->route('dashboard');
        }

        return redirect()->route('guru.dashboard');
    }
}