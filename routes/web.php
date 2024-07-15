<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BankController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\ClubController;
use App\Http\Controllers\JadwalPertandinganController;
use App\Http\Controllers\StadionController;
use App\Http\Controllers\TiketController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\User\MainController;
use App\Http\Controllers\UserController;
use App\Models\JadwalPertandingan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::prefix('admin')->middleware(['auth', 'admin'])->group(function () {
    Route::get('/logout', [AdminController::class, 'logout'])->name('admin.logout');
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::resource('/user-admin', UserController::class);
    Route::resource('/club', ClubController::class);
    Route::resource('/stadion', StadionController::class);
    Route::resource('/jadwal-pertandingan', JadwalPertandinganController::class);
    Route::get('/jadwal-pertandingan/{id_jadwal}/tiket', [TiketController::class, 'index'])->name('tiket.index');
    Route::get('/jadwal-pertandingan/{id_jadwal}/tiket/create', [TiketController::class, 'create'])->name('tiket.create');
    Route::post('/jadwal-pertandingan/{id_jadwal}/tiket/store', [TiketController::class, 'store'])->name('tiket.store');
    Route::get('/jadwal-pertandingan/{id_jadwal}/tiket/{id}/edit', [TiketController::class, 'edit'])->name('tiket.edit');
    Route::put('/jadwal-pertandingan/{id_jadwal}/tiket/{id}/update', [TiketController::class, 'update'])->name('tiket.update');
    Route::delete('/jadwal-pertandingan/{id_jadwal}/tiket{id}/destroy', [TiketController::class, 'destroy'])->name('tiket.destroy');
    // Route::resource('/tiket', TiketController::class);
    Route::resource('/bank', BankController::class);
    Route::resource('/transaksi', TransaksiController::class);
    Route::resource('/banner', BannerController::class);
});

Route::get('/', [MainController::class, 'welcome']);
Route::get('/jadwal-tiket', [MainController::class, 'jadwal']);
Route::get('/jadwal-tiket/{slug_jadwal}/tiket', [MainController::class, 'tiket']);

Route::prefix('user')->middleware(['auth', 'user'])->group(function () {
    Route::get('/transaksi-tiket/{slug}', [MainController::class, 'transaksi']);
    Route::get('/dashboard', function () {
        return view('user.dashboard');
    })->name('user.dashboard');
    // Add more user routes here
});
