<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
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

        $token = $user->createToken('api-token')->plainTextToken;

        Auth::login($user);

        return response()->json(['user' => $user, "token" => $token]);
    }

    // ---------- LOGIN ----------

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials) === false) {
            return response()->json(['message' => 'Hibás e-mail cím vagy jelszó.'], 418);
        }

        $user = auth()->user();
        $token = $user->createToken($request->userAgent())->plainTextToken;

        return response()->json(['user' => $user, "token" => $token]);
    }

    // ---------- LOGOUT ----------

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();
        return response()->json(['message' => 'Sikeres kijelentkezés']);
    }
}
