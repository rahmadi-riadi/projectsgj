<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});
Route::get('/jadwal', function () {
    return view('jadwal');
});
Route::get('/galeri', function () {
    return view('galeri');
});
Route::get('/reservasi', function () {
    return view('reservasi');
});
Route::get('/peta', function () {
    return view('peta');
});
Route::get('/admin', function () {
    return view('admin.index');
});
Route::get('/form', function () {
    return view('form');
});

Route::post('/dashboard/daftaradmin', [RegisterController::class, 'store'])->middleware('admin');
