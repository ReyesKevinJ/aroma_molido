<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ImageController;
use App\Http\Controllers\admin\InboxController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\WeightController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

Route::resource('pesos', WeightController::class)->names('weights');
Route::put('pesos/{peso}/restore', [WeightController::class, 'restore'])->name('weights.restore');
Route::resource('categorias', CategoryController::class)->names('categories');
Route::put('categorias/{categoria}/restore', [CategoryController::class, 'restore'])->name('categories.restore');
Route::resource('productos', ProductController::class)->names('products');
Route::put('productos/{producto}/restore', [ProductController::class, 'restore'])->name('products.restore');
Route::resource('imagenes', ImageController::class)->names('images');
Route::resource('pedidos', OrderController::class)->names('orders');
Route::resource('usuarios', UserController::class)->names('users');
Route::resource('mensajes', InboxController::class)->names('inbox');
Route::get('/', [AdminController::class, 'index'])->name('dashboard');