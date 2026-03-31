<?php

use App\Http\Controllers\ProfileController;
use App\Models\Product;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\NewsLetterController;
use App\Http\Controllers\OrderController;
use App\Models\NewsLetter;

Route::get('/', function () {
    $products = Product::where('quantity', '>', 0)
        ->inRandomOrder()
        ->take(6)
        ->get();

    return view('welcome', compact('products'));
});

// Soft delete kezelés
Route::get("/products/trashed", [ProductController::class, "showTrashed"])->name('products.trashed');

// withTrashed() kell, mert a törölt terméket nem találná meg alapból
Route::post("/products/{product}/restore", [ProductController::class, "restore"])->withTrashed()->name("products.restore");

// Kosár műveletek
Route::get('/cart', [CartController::class, 'cart'])->name('cart');

// POST a CSRF védelem miatt (GET-tel bárki hozzáadhatna a kosárhoz egy külső linkkel)
Route::post('/cart/add/{product}', [CartController::class, 'addToCart'])->name('cart.add');
Route::post('/cart/increase/{id}', [CartController::class, 'increase'])->name('cart.increase');
Route::post('/cart/decrease/{id}', [CartController::class, 'decrease'])->name('cart.decrease');
Route::post('/cart/remove/{id}', [CartController::class, 'removeFromCart'])->name('cart.remove');

// Termékek megjelenítése
Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/{product}', [ProductController::class, 'show'])->name('products.show');

// Guest middleware: a bejelentkezett felhasználó ne érhesse el a login/regisztrációs oldalt
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('loginshow');
    Route::post('/login', [AuthController::class, 'login']);

    Route::get('/register', [AuthController::class, 'showRegister'])->name('registershow');
    Route::post('/register', [AuthController::class, 'register']);
});

// Hírlevél feliratkozás
Route::post('newsletter', [NewsLetterController::class, 'store'])->name('newsletter.store');

// Hitelesített útvonalak
Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
    Route::post('/order', [OrderController::class, 'store'])->name('orders.store');

    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::put('/profile/notifications', [ProfileController::class, 'updateNewsletter'])->name('profile.updateNewsletter');

    //CRUD
    Route::post('/products', [ProductController::class, 'store'])->name('products.store');
    Route::delete('/products/{product}', [ProductController::class, 'destroy'])->name('products.destroy');
    });