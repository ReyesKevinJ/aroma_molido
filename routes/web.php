<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');
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
Route::get('/productos', function () {
    return view('products');
})->name('products');
Route::get('/pregunstas-frecuentes', function () {
    return view('faq');
})->name('faq');
Route::get('/comercializacion', function () {
    return view('comercializacion');
})->name('comercializacion');
Route::get('/inicio-sesion', function () {
    return view('login');
})->name('login');
Route::get('/registro', function () {
    return view('register');
})->name('register');
