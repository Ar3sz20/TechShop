<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        $request->validate(
            [
                'name' => ['required', 'string', 'max:50'],
                'email' => ['required', 'email', 'unique:users,email'],
                'password' => ['required', 'confirmed', Password::min(8)->letters()->numbers()->symbols()]
            ],
            [
                'name.required' => 'A név megadása kötelező',
                'email.required' => 'Az e-mail cím kötelező',
                'email.email' => 'Érvénytelen e-mail cím',
                'email.unique' => 'Ez az e-mail cím már foglalt.ű',
                'password.required' => 'A jelszó kötelező',
                'password.confirmed' => 'A jelszavak nem egyeznek',
                'password.min' => 'A jelszónak legalább 8 karakter hosszúnak kell lennie',
                'password.letters' => 'A jelszónak tartalmaznia kell betűket',
                'password.mixed' => 'A jelszónak tartalmaznia kell kis- és nagybetűt',
                'password.numbers' => 'A jelszónak tartalmaznia kell számot',
                'password.symbols' => 'A jelszónak tartalmaznia kell speciális karaktert',
            ]

        );
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
            'login' => 'Hibás e-mail cím vagy jelszó.'
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
