<?php

namespace App\Http\Controllers;

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

        if(empty($cart)) {
            return redirect()->back()->with('error', 'A kosár üres!');
        }

        $total = 0;

        foreach($cart as $id => $item){
            $product = Product::find($id);
            if (!$product || $product->quantity < $item['quantity']) {
                return redirect()->back()->with('error', 'A(z) "' . $item['name'] . '" termékből nincs elég raktáron!');
            }
            $total += $item['price'] * $item['quantity'];
        }

        $order = Order::create([
            'user_id' => Auth::id(),
            'total_price' => $total
        ]);

        // Decrement stock
        foreach($cart as $id => $item){
            $product = Product::find($id);
            $product->decrement('quantity', $item['quantity']);
        }

        session()->forget('cart');

        return redirect()->route('orders.index')->with('success', 'Sikeres rendelés!');
    }
}