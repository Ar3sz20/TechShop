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
            'postal_code' => 'required|string|max:10',
            'city' => 'required|string|max:100',
            'street' => 'required|string|max:100',
            'house_number' => 'required|string|max:20',
            'floor' => 'nullable|string|max:20',
        ]);

        $user = $request->user();

        $address = implode(';', [
            $request->postal_code,
            $request->city,
            $request->street,
            $request->house_number,
            $request->floor ?? ''
        ]);

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $address,
        ]);

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
