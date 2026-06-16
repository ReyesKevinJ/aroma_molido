<?php


use App\Http\Controllers\AuthController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\User\UserProfileController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('welcome');
Route::get('/contacto', function () {
    return view('contact');
})->name('contact');
Route::get('/politica-privacidad', function () {
    return view('privacy-policy');
})->name('privacy-policy');
Route::get('/terminos-y-condiciones', function () {
    return view('terms-and-conditions');
})->name('terms-and-conditions');
Route::get('/nosotros', function () {
    return view('about');
})->name('about');
Route::get('/productos', [ProductController::class, 'index'])->name('products');
Route::get('/pregunstas-frecuentes', function () {
    return view('faq');
})->name('faq');
Route::get('/comercializacion', function () {
    return view('comercializacion');
})->name('comercializacion');

// Route::get('/inicio-sesion', function () {
//     return view('login');
// })->name('login');
Route::get('/inicio-sesion', [AuthController::class, 'formularioLogin'])->name('login');
Route::post('/inicio-sesion', [AuthController::class, 'autenticar'])->name('login.submit');


// Route::get('/registro', function () {
//     return view('register');
// })->name('register');
Route::get('/registro', [AuthController::class, 'formularioRegistro'])->name('register');
Route::post('/registro', [AuthController::class, 'register'])->name('register.submit');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


//metodo de pagos
Route::get('/metodo-pagos', function () {
    return view('payment-method');
})->middleware('auth')->name('payment.method');


Route::post('/orders', [OrderController::class, 'store'])
    ->name('orders.store')->middleware('auth');
Route::post('/contact', [ContactController::class, 'store'])
    ->name('contact.store');


Route::middleware(['auth'])->group(function () {
    Route::get('/mis-pedidos', [OrderController::class, 'index'])->name('user.my-orders');

    //perfil usuario
    Route::get('/perfil', [UserProfileController::class, 'edit'])->name('user.profile');
    Route::put('/perfil', [UserProfileController::class, 'update'])->name('user.profile.update');

    //detalles de pedidos
    Route::get('/mis-pedidos/{id}', [OrderController::class, 'show'])->name('user.my-orders.show');
});
