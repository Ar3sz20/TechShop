<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
Route::get('/', function () {
    return view('welcome');
});

Route::get('/products', [ProductController::class, 'index'])
->name('products.index');


Route::get('/login', [AuthController::class, 'showLogin'])->name('loginshow');
Route::post('/login', [AuthController::class, 'login']);

Route::get('/register', [AuthController::class, 'showRegister'])->name('registershow');
Route::post('/register', [AuthController::class, 'register']);

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function () {
    Route::get('/cart', [CartController::class, 'index']);
});
