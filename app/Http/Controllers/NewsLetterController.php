<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\NewsLetter;
use Illuminate\Http\Request;


class NewsLetterController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:newsletters'
        ]);

        NewsLetter::create([
            'email' => $request->email
        ]);

        return response()->json(['success' => true]);
    }
}
