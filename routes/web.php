<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductsController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('admin/user/register', [UserController::class, 'showRegister'])->name('register');
Route::post('admin/user/register', [UserController::class, 'register'])->name('register.store');
Route::get('admin/user/login', [UserController::class, 'login'])->name('login');
Route::post('admin/user/login', [UserController::class, 'authentication'])->name('login.store');
Route::get('admin/user', [UserController::class, 'index']);
Route::get('admin/{user?}', [UserController::class, 'show']);

Route::middleware('auth')->group(function(){
Route::get('products', [ProductsController::class, 'index'])->name('products.index');
Route::get('products/create', [ProductsController::class, 'create'])->name('products.create');
Route::get('products/{product}', [ProductsController::class, 'show']);
Route::post('products', [ProductsController::class, 'store'])->name('products.store');
Route::get('my-products', [ProductsController::class, 'myProducts'])->name('my.products');
Route::get('products/{product}/edit', [ProductsController::class, 'edit'])->name('products.edit');
Route::put('products/{product}', [ProductsController::class, 'update'])->name('products.update');
Route::delete('products/{product}', [Productscontroller::class, 'destroy'])->name('products.destroy');
});
