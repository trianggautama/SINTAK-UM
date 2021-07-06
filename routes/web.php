<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\{
    MainController,DepanController,AuthController,BukuController,PeminjamanController
};

Route::get('/', [DepanController::class, 'depan'])->name('depan'); 
Route::get('/cari', [DepanController::class, 'cari'])->name('cari'); 

Route::prefix('/auth')->name('auth.')->group(function (){
    Route::get('/', [AuthController::class, 'login'])->name('login'); 
    Route::post('/', [AuthController::class, 'login_store'])->name('loginStore'); 
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout'); 
});

Route::prefix('/user-admin')->name('userAdmin.')->middleware('auth')->group(function (){
    Route::get('/beranda', [MainController::class, 'admin_beranda'])->name('beranda'); 
    Route::resource('tipe_dokumen', '\App\Http\Controllers\TipeDokumenController');
    Route::resource('buku', '\App\Http\Controllers\BukuController');
    Route::resource('peminjaman', '\App\Http\Controllers\PeminjamanController');
    Route::resource('informasi', '\App\Http\Controllers\InformasiController');
    Route::post('/pengembalian', [PeminjamanController::class, 'pengembalian'])->name('pengembalian.store'); 
});

Route::get('/buku/{id}', [BukuController::class, 'api'])->name('buku.api'); 

