<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Models\Product;

Route::get('/', function () {
    $products = Product::all();
    return view('home', ['products' => $products]);
});
Route::post('/register', [UserController::class, 'register']);
Route::post('/logout', [UserController::class, 'logout']);
Route::post('/login', [UserController::class, 'login']);

Route::post('/add-product', [ProductController::class, 'addProduct']);
Route::get('/edit-product/{product}', [ProductController::class, 'showEditScreen']);
Route::put('/edit-product/{product}', [ProductController::class, 'updateProduct']);
Route::delete('/delete-product/{product}', [ProductController::class, 'deleteProduct']);