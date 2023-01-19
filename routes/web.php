<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\PengunjungController;
use App\Http\Controllers\PetugasController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function () {
    Route::group(['controller' => PetugasController::class, 'middleware' => 'admin'], function () {
        Route::get('/', 'index')->name('home');
        Route::prefix('petugas')->group(function () {
            Route::get('tambah', 'create')->name('petugas.tambah');
            Route::post('tambah', 'store')->name('petugas.tambah.simpan');
            Route::get('edit/{petugas:nim}', 'edit')->name('petugas.edit');
            Route::patch('edit/{petugas:nim}', 'update')->name('petugas.edit.simpan');
            Route::delete('hapus/{petugas:nim}', 'destroy')->name('petugas.hapus');
        });
    });

    Route::group(['controller' => BukuController::class], function () {
        Route::prefix('buku')->group(function () {
            Route::get('/', 'index');
            Route::get('tambah', 'create')->name('buku.tambah');
            Route::post('tambah', 'store')->name('buku.tambah.simpan');
            Route::get('edit/{buku}', 'edit')->name('buku.edit');
            Route::patch('edit/{buku}', 'update')->name('buku.edit.simpan');
            Route::delete('hapus/{buku}', 'destroy')->name('buku.hapus');
        });
    });

    Route::group(['controller' => PengunjungController::class], function () {
        Route::prefix('pengunjung')->group(function () {
            Route::get('/', 'index');
            Route::get('tambah', 'create')->name('pengunjung.tambah');
            Route::post('tambah', 'store')->name('pengunjung.tambah.simpan');
            Route::get('edit/{pengunjung}', 'edit')->name('pengunjung.edit');
            Route::patch('edit/{pengunjung}', 'update')->name('pengunjung.edit.simpan');
            Route::delete('hapus/{pengunjung}', 'destroy')->name('pengunjung.hapus');
        });
    });

    Route::group(['controller' => PeminjamanController::class], function () {
        Route::prefix('peminjaman')->group(function () {
            Route::get('/', 'index');
            Route::get('tambah', 'create')->name('peminjaman.tambah');
            Route::post('tambah', 'store')->name('peminjaman.tambah.simpan');
            Route::get('edit/{peminjaman}', 'edit')->name('peminjaman.edit');
            Route::patch('edit/{peminjaman}', 'update')->name('peminjaman.edit.simpan');
            Route::delete('hapus/{peminjaman}', 'destroy')->name('peminjaman.hapus');
        });
    });
});


Route::controller(LoginController::class)->group(function () {
    Route::middleware('guest')->group(function () {
        Route::get('login', 'index')->name('login');
        Route::post('login', 'store');
    });
    Route::post('logout', 'destroy')->middleware('auth');
});
