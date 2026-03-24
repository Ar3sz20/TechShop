<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function update(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'address' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:20',
        ]);

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'address' => $request->address,
            'phone' => $request->phone,
        ]);

        return redirect()->route('profile.show')->with('success', 'Profil frissítve!');
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
    public function show()
{
    $user = auth()->user();
    $orders = $user->orders()->orderBy('created_at', 'desc')->get();

    return view('profile', compact('user', 'orders'));
}
}
