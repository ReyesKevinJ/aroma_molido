<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ImageController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\WeightController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

Route::resource('pesos', WeightController::class)->names('weights');
Route::put('pesos/{peso}/restore', [WeightController::class, 'restore'])->name('weights.restore');
Route::resource('categorias', CategoryController::class)->names('categories');
Route::resource('productos', ProductController::class)->names('products');
Route::resource('imagenes', ImageController::class)->names('images');
Route::resource('pedidos', OrderController::class)->names('orders');
Route::resource('usuarios', UserController::class)->names('users');
Route::get('/consultas', [AdminController::class, 'consultas'])->name('consultas');
Route::get('/', [AdminController::class, 'index'])->name('dashboard');
