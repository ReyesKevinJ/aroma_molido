<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/contacto', function () {
    return view('contact');
})->name('contact');
Route::get('/politica-privacidad', function () {
    return view('privacy-policy');
})->name('privacy-policy');
Route::get('/terminos-y-condiciones', function () {
    return view('terms-and-conditions');
})->name('terms-and-conditions');
