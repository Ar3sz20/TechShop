<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return response()->json(["products" => $products]);
    }

    public function store(StoreProductRequest $request)
    {
        $data = $request->validated();

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('products', 'public');
        }
        else {
            $data['image'] = "placeholder.png";
        }

        Product::create($data);

        $products = Product::all();
        return response()->json(["message" => "Termék sikeresen létrehozva!", "products" => $products]);
    }

    public function show(Product $product)
    {
        return response()->json(["product" => $product]);
    }

    public function edit(Product $product)
    {
        return response()->json(["product" => $product]);
    }

    public function update(UpdateProductRequest $request, Product $product)
    {
        $product->update($request->validated());
        return response()->json(["message" => "Termék sikeresen frissítve!", "product" => $product]);
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return response()->json(["message" => "Termék sikeresen törölve!"]);
    }

    public function showTrashed()
    {
        $trashedProducts = Product::onlyTrashed()->get();
        return response()->json(["products" => $trashedProducts]);
    }

    public function restore(Product $product)
    {
        $product->restore();
        return response()->json(["message" => "Termék sikeresen visszaállítva!", "product" => $product]);
    }
}
