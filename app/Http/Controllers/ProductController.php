<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Product::query();

        if ($request->filled('name')) {
        $query->where('name', 'like', '%' . $request->name . '%');
    }

        // Kategória
        if ($request->filled('category')) {
            $query->where('category', $request->category);
        }

        // Típus (csak ha valid)
        if ($request->filled('type') && $request->filled('category')) {

            $validTypes = Product::where('category', $request->category)->pluck('type')->toArray();

            if (in_array($request->type, $validTypes)) {
                $query->where('type', $request->type);
            }
        }

        // Ár
        if ($request->filled('min_price')) {
            $query->where('price', '>=', $request->min_price);
        }

        if ($request->filled('max_price')) {
            $query->where('price', '<=', $request->max_price);
        }

        $products = $query->get();

        return view('products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {
        // FIX: Használjuk a validated() metódust az all() helyett a biztonság érdekében
        $data = $request->validated();

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('products', 'public');
        } else {
            $data['image'] = "placeholder.png";
        }

        Product::create($data);

        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return view('products.show', ['product' => $product]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        // Megjegyzés: Ha ugyanazt a nézetet használod create-hez és edit-hez, 
        // győződj meg róla, hogy a form kezeli a $product meglétét/hiányát.
        return view("products.edit", compact("product"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        // A validated() csak az ellenőrzött mezőket adja vissza $data = $request->validated();
        $data = $request->validated();

        // Ha új kép van feltöltve
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('products', 'public');
        }

        $product->update($data);

        return redirect()->route('products.index')
            ->with('success', 'Termék frissítve!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route("products.index")->with('success', 'Termék lomtárba került.');
    }

    /**
     * Törölt termékek megjelenítése.
     */
    public function showTrashed() // FIX: camelCase névkonvenció (ShowTrashed helyett)
    {
        $trashedProducts = Product::onlyTrashed()->get();
        return view("products.index", ["products" => $trashedProducts]);
    }

    /**
     * Termék visszaállítása.
     */
    public function restore(Product $product)
    {
        // Mivel a route-nál használtad a ->withTrashed() kiegészítést, 
        // a Laravel automatikusan beinjektálja a törölt modellt is.
        $product->restore();

        return redirect()->route("products.index")->with("success", "Termék sikeresen visszaállítva!");
    }
}