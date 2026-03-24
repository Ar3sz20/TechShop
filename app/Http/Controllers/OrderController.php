<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use App\Models\Product;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Auth::user()->orders()->latest()->get();
        return view('orders.index', compact('orders'));
    }
    public function store()
    {
        $cart = session()->get('cart', []);

    if (empty($cart)) {
        return redirect()->back()->with('error', 'A kosár üres!');
    }

    $request->validate([
        'address' => 'required|string|max:255',
    ]);

        $total = 0;

        foreach($cart as $item){
            $total += $item['price'] * $item['quantity'];
        }

        Order::create([
            'user_id' => Auth::id(),
            'total_price' => $total
        ]);

    session()->forget('cart');

        return redirect()->route('orders.index')->with('success','Sikeres rendelés!');
    }
}