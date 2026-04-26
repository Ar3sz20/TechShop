<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Request\StoreProudctRequest;
use App\Http\Requests\Api\Request\UpdateProudctRequest;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return response()->json(["products" => $products]);
    }

    public function store(StoreProudctRequest $request)
    {
        $data = $request->validated();

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('products', 'public');
        }
        else {
            $data['image'] = "image/products/placeholder.png";
        }

        Product::create($data);

        $products = Product::all();
        return response()->json(["message" => "Termék sikeresen létrehozva!", "products" => $products]);
    }

    public function bulkStore(Request $request)
    {
        $products = $request->all();

        foreach ($products as $data) {
            Product::create($data);
        }

        return response()->json(['message' => 'Bulk upload ok']);
    }

    public function show(Product $product)
    {
        return response()->json(["product" => $product]);
    }

    public function edit(Product $product)
    {
        return response()->json(["product" => $product]);
    }

    public function update(UpdateProudctRequest $request, Product $product)
    {
        $product->update($request->validated());
        return response()->json(["message" => "Termék sikeresen frissítve!", "product" => $product]);
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return response()->json(["message" => "Termék sikeresen törölve!"]);
    }

    public function forceDelete(Product $product)
    {
        $product->forceDelete();
        return response()->json(["message" => "Termék véglegesen törölve!"]);
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
