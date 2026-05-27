<?php

use App\Http\Controllers\Admin\WeightController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

Route::resource('pesos', WeightController::class)->names('admin.weights');
Route::get('/', [AdminController::class, 'index'])->name('admin.dashboard');