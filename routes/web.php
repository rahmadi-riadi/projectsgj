<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\GoogleAuth\LoginGoogleController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\RoleController;
use App\Http\Controllers\ReservasiController;
use Illuminate\Support\Facades\Auth;

// Route untuk pengguna biasa
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/jadwal', [HomeController::class, 'jadwal'])->name('jadwal');
Route::get('/galeri', [HomeController::class, 'galeri'])->name('galeri');
Route::get('/peta', [HomeController::class, 'peta'])->name('peta');

// Route login untuk admin
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Route login google user biasa
Route::get('/auth/google', [LoginGoogleController::class, 'googlepage'])->name('google.login');
Route::get('/auth/google/callback', [LoginGoogleController::class, 'googlecallback']);
Route::post('/logout-google', [LoginGoogleController::class, 'logout'])->name('logout-google');

// Route admin
Route::group(['middleware' => ['auth:admin']], function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
    Route::get('/admin/posts', [AdminController::class, 'posts'])->name('admin.posts');
    Route::get('/admin/wisata', [AdminController::class, 'wisata'])->name('admin.wisata');
    Route::get('/admin/agenda', [AdminController::class, 'agenda'])->name('admin.agenda');
    Route::get('/admin/setadmin', [AdminController::class, 'setadmin'])->name('admin.setadmin');

    // Route untuk menampilkan form tambah admin
    Route::get('/admin/create', [AdminController::class, 'createAdmin'])->name('admin.create');

    // Route untuk menyimpan admin baru
    Route::post('/admin/store', [AdminController::class, 'storeAdmin'])->name('admin.store');

    Route::get('/admin/{admin}/edit', [AdminController::class, 'editAdmin'])->name('admin.edit');

    // Route untuk menyimpan perubahan pada admin yang diedit
    Route::put('/admin/{admin}', [AdminController::class, 'updateAdmin'])->name('admin.update');

    // Route untuk menghapus admin
    Route::delete('/admin/{admin}', [AdminController::class, 'destroyAdmin'])->name('admin.destroy');

    // Route untuk manajemen reservasi
    Route::get('/admin/reservasi', [AdminController::class, 'reservasiIndex'])->name('admin.reservasi.index');
    Route::get('/admin/reservasi/create', [AdminController::class, 'reservasiCreate'])->name('admin.reservasi.create');
    Route::post('/admin/reservasi', [AdminController::class, 'reservasiStore'])->name('admin.reservasi.store');
    Route::get('/admin/reservasi/{id}', [AdminController::class, 'reservasiShow'])->name('admin.reservasi.show');
    Route::get('/admin/reservasi/{id}/edit', [AdminController::class, 'reservasiEdit'])->name('admin.reservasi.edit');
    Route::put('/admin/reservasi/{id}', [AdminController::class, 'reservasiUpdate'])->name('admin.reservasi.update');
    Route::delete('/admin/reservasi/{id}', [AdminController::class, 'reservasiDestroy'])->name('admin.reservasi.destroy');
});

// Route reservasi
Route::get('/reservasi', function () {
    if (Auth::check()) {
        return redirect()->route('reservasi.form');
    }
    return view('reservasi');
})->name('reservasi');

Route::middleware('auth')->group(function () {
    Route::get('/reservasi/form', [ReservasiController::class, 'create'])->name('reservasi.form');
    Route::post('/reservasi', [ReservasiController::class, 'store'])->name('reservasi.store');
    Route::get('/reservasi/{id}/edit', [ReservasiController::class, 'edit'])->name('reservasi.edit');
    Route::get('/reservasi/{id}', [ReservasiController::class, 'show'])->name('reservasi.show');
});

// Route sukses
Route::get('/sukses', function () {
    return view('sukses');
})->name('keterangan.sukses');

Route::get('/sukses/{id}', [ReservasiController::class, 'showSuccess'])->name('keterangan.sukses.detail');

// Route untuk role dan permission
Route::group(['prefix' => 'all', 'middleware' => ['auth']], function () {
    Route::get('/permission', [RoleController::class, 'Allpermission'])->name('all.permission');
    Route::get('/add/type', [RoleController::class, 'AddType'])->name('add.type');
    Route::post('/store/type', [RoleController::class, 'StoreType'])->name('store.type');
    Route::get('/edit/type/{id}', [RoleController::class, 'EditType'])->name('edit.type');
    Route::post('/update/type', [RoleController::class, 'UpdateType'])->name('update.type');
    Route::get('/delete/type/{id}', [RoleController::class, 'DeleteType'])->name('delete.type');
});

