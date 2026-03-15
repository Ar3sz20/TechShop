<?php

namespace App\Http\Controllers;

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
    public function store()
    {
        $cart = session()->get('cart', []);

        if(empty($cart)) {
            return redirect()->back()->with('error', 'A kosár üres!');
        }

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