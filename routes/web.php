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



// Route::post('/dashboard/daftaradmin', [RegisterController::class, 'store'])->middleware('admin');

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('auth/google', [LoginGoogleController::class, 'googlepage']);
Route::get('auth/google/callback', [LoginGoogleController::class, 'googlecallback']);
Route::get('/logout', [LoginGoogleController::class, 'logout'])->name('logout');

Route::get('/reservasi', [ReservasiController::class, 'index'])->name('reservasi');
Route::get('/reservasi/form', [ReservasiController::class, 'viewForm'])->name('reservasi');

Route::get('/admin', [DashboardController::class, 'index'])->middleware('auth');
Route::get('/admin/posts', function () {
    return view('admin.posts');
})->middleware('auth');
Route::get('/admin/wisata', function () {
    return view('admin.wisata');
})->middleware('auth');
Route::get('/admin/agenda', function () {
    return view('admin.agenda');
})->middleware('auth');
Route::get('/admin/setadmin', function () {
    return view('admin.setadmin');
})->middleware('auth');

// Route::resource('reservasi', \App\Http\Controllers\ReservasiController::class)->only([
//     'index',
//     'create',
//     'store',
//     'edit',
//     'update',
//     'destroy'
// ]);

Route::post('/reservasi', [ReservasiController::class, 'store']);

// Route::group(['middleware' => ['auth']], function () {
//     Route::get('/reservasi', function () {
//         return redirect()->route('form');
//     });
// });

// Route::get('/reservasi/form', [ReservasiController::class, 'viewForm'])->name('form');



// Route::get('Reservasi', [ReservasitController::class, 'index']);
// Route::get('Reservasi/create', [ReservasiController::class, 'create']);
// Route::post('Reservasi', [ReservasiController::class, 'store']);
// Route::get('Reservasi/{id}/edit', [ReservasiController::class, 'edit']);
// Route::put('Reservasi/{id}', [ReservasiController::class, 'update']);
// Route::delete('Reservasi/{id}', [ReservasiController::class, 'destroy']);






