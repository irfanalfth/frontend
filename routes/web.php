<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\LaporanController;
use Illuminate\Support\Facades\Route;

Route::get('/', [AuthController::class, 'index'])->name('login.page');

// group route untuk BarangController
Route::controller(BarangController::class)->group(function () {
    Route::get('/barang', 'index')->name('barang');
    Route::get('/barang/edit/{kodebr}', 'edit');
    Route::get('/barang/add', 'add')->name('barang.add');
    Route::post('/barang', 'updateData')->name('barang.update');
    Route::post('/barang/add', 'storeData')->name('barang.add');
    Route::get('/barang/delete/{kodebr}', 'removeData')->name('barang.remove');
});

// group route untuk LaporanController
Route::controller(LaporanController::class)->group(function () {
    Route::get('/laporan', 'index')->name('laporan');
    Route::get('/laporan/pdf/{kodebr}', 'generatePDF1');
});

// Auth
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
