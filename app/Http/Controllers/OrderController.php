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
        $products = Product::all();
        return view('welcome', compact('products'));
    }
 public function store(Request $request)
{
    $user = Auth::user();
    $cart = session()->get('cart', []);

    if (empty($cart)) {
        return redirect()->back()->with('error', 'A kosár üres!');
    }

    $request->validate([
        'address' => 'required|string|max:255',
    ]);

    $total = 0;
    foreach ($cart as $item) {
        $total += $item['price'] * $item['quantity'];
    }

    Order::create([
        'user_id' => $user->id,
        'address' => $request->address,
        'total_price' => $total,
        'items' => json_encode($cart),
    ]);

    if ($user->address !== $request->address) {
        $user->update(['address' => $request->address]);
    }

    session()->forget('cart');

    return redirect()->route('orders.index')->with('success', 'Sikeres rendelés!');
}
}