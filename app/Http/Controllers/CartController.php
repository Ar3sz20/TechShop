<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function cart()
    {
        //a kosár lekérezése a sessionből
        $cart = session()->get('cart', []);

        return view('cart.index', compact('cart'));
    }
    public function addToCart($id)
    { 
        $product = Product::find($id);

        $cart = session()->get("cart", []);
        //ha már van olyan terméka sessionben nővelje az mennyiségét ha nincs akkor adja hozzá
        if (isset($cart[$id])) 
        {
            $cart[$id]["quantity"]++;
        }
        else
        {
            $cart[$id] = [
                "name" => $product->name,
                "price" => $product->price,
                "quantity" => 1,
                "image" => $product->image,
            ];
        }
        //a kosár sessionbe rakása
        session()->put("cart", $cart);

        return redirect()->back()->with("msg", "Termék kosárba téve!");
    }

    public function removeFromCart($id)
    {
        //sessionben való adot termék kiválasztása
        $cart = session()->get('cart', []);

        //ha a sessionben van az adot termék szedje ki
        if (isset($cart[$id])) 
        {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }

        return redirect()->back()->with('success', 'Termék eltávolítva.');
    }

}
