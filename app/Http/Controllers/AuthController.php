<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class AuthController extends Controller
{
    // ---------- VIEWS ----------

    public function showLogin()
    {
        return view('auth.login');
    }

    public function showRegister()
    {
        return view('auth.register');
    }

    // ---------- REGISTER ----------

    public function register(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:50'],
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => ['required', 'confirmed', Password::min(8)->letters()->numbers()->symbols()]
        ]);
        // Redundáns a Hash::make() mert a User modellben a password hashed cast van beállítva, de okozhat GUI bugot egyes SQL kezelő programokban ritka esetekben.
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'role' => 0,
            'password' => $request->password,
        ]);

        Auth::login($user);

        return redirect('/');
    }

    // ---------- LOGIN ----------

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect('/');
        }

        return back()->withErrors([
            'email' => 'Hibás adatok',
            'password' => 'Hibás adatok'
        ]);
    }

    // ---------- LOGOUT ----------

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
