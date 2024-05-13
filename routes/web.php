<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Auth;

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

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');

Route::post('/login', [LoginController::class, 'authenticate']);

Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/admin', [DashboardController::class, 'index'])->middleware('auth');
