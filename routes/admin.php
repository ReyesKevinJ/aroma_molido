<?php

use App\Http\Controllers\Admin\WeightController;
use Illuminate\Support\Facades\Route;

Route::resource('pesos', WeightController::class)->names('admin.weights');
