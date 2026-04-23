<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\UserController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::get('/products', [ProductController::class, 'index']);
Route::post('/products/store', [ProductController::class, 'store']);
Route::post('/products/bulk', [ProductController::class, 'bulkStore']);
Route::put('/products/{product}', [ProductController::class, 'update']);
Route::delete('/products/{product}', [ProductController::class, 'destroy']);
Route::delete('/products/{product}/force', [ProductController::class, 'forceDelete'])->withTrashed();
Route::get('/products/trashed', [ProductController::class, 'showTrashed']);
Route::post('/products/{product}/restore', [ProductController::class, 'restore'])->withTrashed();