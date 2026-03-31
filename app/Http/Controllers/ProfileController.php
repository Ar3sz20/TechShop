<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Auth;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    // Profil oldal megjelenítése
    public function show()
    {
        $user = auth()->user();

        $products = Product::all();

        return view('profile', compact('user', 'products'));
    }

    // Profil adatok mentése
    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:50',
            'email' => 'required|email',
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string|max:255',
        ]);

        $user = $request->user();
        $user->update($request->only('name', 'email', 'phone', 'address'));

        return redirect()->back()->with('success', 'Profil frissítve.');
    }

    public function updateNewsletter(Request $request)
    {
        $request->validate([
            'newsletter' => 'sometimes|boolean',
        ]);

        $user = $request->user();
        $user->newsletter = $request->has('newsletter');
        $user->save();

        return redirect()->back()->with('success', 'Értesítési beállítások frissítve.');
    }
}
