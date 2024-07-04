<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\ClubController;
use App\Http\Controllers\JadwalPertandinganController;
use App\Http\Controllers\StadionController;
use App\Http\Controllers\TiketController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/tes', function () {
    return view('layouts.user.index');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::prefix('admin')->middleware(['auth'])->group(function () {
    Route::get('/logout', [AdminController::class, 'logout'])->name('admin.logout');
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::resource('/user-admin', UserController::class);
    Route::resource('/club', ClubController::class);
    Route::resource('/stadion', StadionController::class);
    Route::resource('/jadwal-pertandingan', JadwalPertandinganController::class);
    Route::resource('/tiket', TiketController::class);
    Route::resource('/transaksi', TransaksiController::class);
    Route::resource('/banner', BannerController::class);
});

Route::prefix('user')->middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('user.dashboard');
    })->name('user.dashboard');
    // Add more user routes here
});
