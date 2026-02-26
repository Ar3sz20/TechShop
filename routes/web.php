<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;

Route::get('/', function () {
    return view('welcome');
});

//softdelethez való részek
Route::get("/products/trashed", [ProductController::class, "trashed"]) -> name("products.trashed");
Route::post("/products/{product}/restore", [ProductController::class,"restore"])->name("products.restore");
//kosár
Route::get('/cart', [CartController::class, 'cart'])->name('cart');
//termékek
Route::get('/products', [ProductController::class, 'index'])->name('products.index');

//auth
Route::get('/login', [AuthController::class, 'showLogin'])->name('loginshow');
Route::post('/login', [AuthController::class, 'login']);

Route::get('/register', [AuthController::class, 'showRegister'])->name('registershow');
Route::post('/register', [AuthController::class, 'register']);


Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    //kosárhoz adás
    Route::get('/cart/add/{product}', [CartController::class, 'addToCart'])->name('cart.add');
});
