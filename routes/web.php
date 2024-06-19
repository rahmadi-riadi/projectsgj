<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LoginGoogleController;
use App\Http\Controllers\ReservasiController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;


// Rute untuk pengguna biasa
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/jadwal', [HomeController::class, 'jadwal'])->name('jadwal');
Route::get('/galeri', [HomeController::class, 'galeri'])->name('galeri');
Route::get('/peta', [HomeController::class, 'peta'])->name('peta');


Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('auth/google', [LoginGoogleController::class, 'googlepage'])->name('google.login');
Route::get('auth/google/callback', [LoginGoogleController::class, 'googlecallback']);
Route::post('/logout-google', [LoginGoogleController::class, 'logout'])->name('logout-google');


Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin', [DashboardController::class, 'index'])->name('admin.index');
    Route::resource('/admin/images', ImageController::class);
    Route::get('/admin/posts', [DashboardController::class, 'posts'])->name('admin.posts');
    Route::get('/admin/wisata', [DashboardController::class, 'wisata'])->name('admin.wisata');
    Route::get('/admin/agenda', [DashboardController::class, 'agenda'])->name('admin.agenda');
    Route::get('/admin/setadmin', [DashboardController::class, 'setAdmin'])->name('admin.setadmin');
});

Route::get('/reservasi', function () {
    if (Auth::check()) {
        return redirect()->route('reservasi.form');
    }
    return view('reservasi');
})->name('reservasi');

Route::middleware('auth')->group(function () {
    Route::get('/reservasi/form', function () {
        return view('form');
    })->name('reservasi.form');
    Route::post('/reservasi', [ReservasiController::class, 'store'])->name('reservasi.store');
    Route::get('/reservasi/{id}/edit', [ReservasiController::class, 'edit'])->name('reservasi.edit');
});

Route::get('/sukses', function () {
    return view('sukses');
})->name('keterangan.sukses');

Route::get('/sukses/{id}', [ReservasiController::class, 'showSuccess'])->name('keterangan.sukses');

