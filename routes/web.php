<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BankController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\ClubController;
use App\Http\Controllers\JadwalPertandinganController;
use App\Http\Controllers\StadionController;
use App\Http\Controllers\TiketController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\User\AuthController;
use App\Http\Controllers\User\MainController;
use App\Http\Controllers\UserController;
use App\Models\JadwalPertandingan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('login', [AuthController::class, 'login']);
Route::get('register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('register', [AuthController::class, 'register']);
Route::post('logout', [AuthController::class, 'logout'])->name('logout');


// Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::prefix('admin')->middleware(['auth', 'admin'])->group(function () {
    Route::get('/logout', [AdminController::class, 'logout'])->name('admin.logout');
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::resource('/pengguna', UserController::class);
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

    Route::post('/transaksi/{id}/konfirmasi', [TransaksiController::class, 'konfirmasi'])->name('admin.transaksi.konfirmasi');
});

Route::get('/', [MainController::class, 'welcome']);
Route::get('/jadwal-tiket', [MainController::class, 'jadwal']);
Route::get('/jadwal-tiket/{slug_jadwal}/tiket', [MainController::class, 'tiket']);

Route::prefix('user')->middleware(['auth', 'user'])->group(function () {
    Route::get('/tiket-saya', [MainController::class, 'listTiketSaya'])->name('');
    Route::get('/tiket-saya/{no_invoice}/{slug}', [MainController::class, 'detailTiketSaya']);
    Route::get('/transaksi-tiket/{slug}', [MainController::class, 'transaksi']);
    Route::post('/transaksi-tiket/{slug}/checkout', [MainController::class, 'checkout']);
    Route::get('/invoice/{no_invoice}', [MainController::class, 'invoice']);
    Route::post('/invoice/{no_invoice}/uploadBukti', [MainController::class, 'uploadBukti']);
});
