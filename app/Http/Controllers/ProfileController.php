<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
       public function updateNewsletter(Request $request)
    {
        $request->validate([
            'newsletter' => 'sometimes|boolean',
        ]);

        $user = $request->user();
        $user->newsletter = $request->has('newsletter');
        $user->save();

        return redirect()->back()->with('success', 'Értesítési beállítások frissítve.');
    }}
