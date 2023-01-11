<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\PetugasController;
use Illuminate\Support\Facades\Route;

Route::group(['controller' => PetugasController::class, 'middleware' => 'auth'], function () {
    Route::get('/', 'index')->name('home');
    Route::prefix('petugas')->group(function () {
        Route::get('tambah-data', 'create')->name('petugas.tambah');
    });
});

Route::group(['controller' => BukuController::class], function () {
    Route::prefix('buku')->group(function () {
        Route::get('/', 'index');
        Route::get('tambah-data', 'create')->name('buku.tambah');
    });
});

Route::controller(LoginController::class)->group(function () {
    Route::get('login', 'index')->name('login');
    Route::post('login', 'store');
    Route::post('logout', 'destroy');
});
