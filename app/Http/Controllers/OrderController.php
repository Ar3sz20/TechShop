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

    public function store(Request $request)
    {
        $cart = session()->get('cart', []);

        if (empty($cart)) {
            return redirect()->back()->with('error', 'A kosár üres!');
        }

        $request->validate([
            'postal_code' => 'required|string',
            'city' => 'required|string',
            'street' => 'required|string',
            'house_number' => 'required|string',
            'floor' => 'nullable|string',
            'payment_method' => 'required|string'
        ]);

        $total = 0;

        // Ellenőrizzük, hogy minden termékből van-e elég raktáron
        foreach($cart as $id => $item){
            $product = Product::find($id);
            if (!$product || $product->quantity < $item['quantity']) {
                return redirect()->back()->with('error', 'A(z) "' . $item['name'] . '" termékből nincs elég raktáron!');
            }
            $total += $item['price'] * $item['quantity'];
        }

        $address = implode(';', [
            $request->postal_code,
            $request->city,
            $request->street,
            $request->house_number,
            $request->floor ?? ''
        ]);

        
        Order::create([
            'user_id' => Auth::id(),
            'total_price' => $total,
            'address' => $address,
            'item_id' => implode(',', array_keys($cart)),
            'item_quantity' => implode(',', array_column($cart, 'quantity')),
            'payment_method' => $request->payment_method,
            'status' => 'pending'
        ]);

        // Raktárkészlet csökkentése a megrendelt mennyiséggel
        foreach($cart as $id => $item){
            $product = Product::find($id);
            $product->decrement('quantity', $item['quantity']);
        }

        session()->forget('cart');

        return redirect()->route('orders.index')->with('success', 'Sikeres rendelés!');
    }
}