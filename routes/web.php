<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ReservasiController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\LoginGoogleController;


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

Route::post('/dashboard/daftaradmin', [RegisterController::class, 'store'])->middleware('admin');

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::get('/reservasi', [ReservasiController::class, 'index'])->name('reservasi');
Route::get('/reservasi/form', [ReservasiController::class, 'viewForm'])->name('reservasi');

Route::post('/login', [LoginController::class, 'authenticate']);

Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/admin', [DashboardController::class, 'index'])->middleware('auth');


Route::get('auth/google', [LoginGoogleController::class, 'googlepage']);
Route::get('auth/google/callback', [LoginGoogleController::class, 'googlecallback']);
Route::get('/logout', [LoginGoogleController::class, 'logout'])->name('logout');

