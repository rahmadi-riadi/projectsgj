<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ReservasiController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\LoginGoogleController;

// Halaman Utama
Route::get('/', function () {
    return view('home');
});
// Halaman Lainnya
Route::get('/jadwal', function () {
    return view('jadwal');
});
Route::get('/galeri', function () {
    return view('galeri');
});
Route::get('/peta', function () {
    return view('peta');
});

// Route untuk login pengguna biasa
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Route untuk login dengan Google
Route::get('auth/google', [LoginGoogleController::class, 'googlepage'])->name('google.login');
Route::get('auth/google/callback', [LoginGoogleController::class, 'googlecallback']);
Route::post('/logout-google', [LoginGoogleController::class, 'logout'])->name('logout-google');

// Route untuk Admin
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin', [DashboardController::class, 'index']);
    Route::get('/admin/posts', function () {
        return view('admin.posts');
    });
    Route::get('/admin/wisata', function () {
        return view('admin.wisata');
    });
    Route::get('/admin/agenda', function () {
        return view('admin.agenda');
    });
    Route::get('/admin/setadmin', function () {
        return view('admin.setadmin');
    });
});

// Rute untuk halaman reservasi yang menampilkan tombol login dengan Google
Route::get('/reservasi', function () {
    if (Auth::check()) {
        return redirect()->route('reservasi.form');
    }
    return view('reservasi');
})->name('reservasi');

// Rute untuk form reservasi yang membutuhkan autentikasi
Route::middleware('auth')->group(function () {
    Route::get('/reservasi/form', function () {
        return view('form');
    })->name('reservasi.form');
    Route::post('/reservasi', [ReservasiController::class, 'store'])->name('reservasi.store');
    Route::get('/reservasi/{id}/edit', [ReservasiController::class, 'edit'])->name('reservasi.edit');
});

// Sukses
Route::get('/sukses', function () {
    return view('sukses');
})->name('keterangan.sukses');

// Rute untuk halaman sukses yang mengambil data dari controller
Route::get('/sukses/{id}', [ReservasiController::class, 'showSuccess'])->name('keterangan.sukses');

