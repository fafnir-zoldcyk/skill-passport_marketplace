<?php

use App\Http\Controllers\GambarController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\TokoController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
//User
Route::get('/user',[UserController::class,'index']);

//Produk
Route::get('/pro',[ProdukController::class,'index'])->name('produk');
Route::post('/stopro',[ProdukController::class,'store'])->name('store-produk');

//Toko
Route::get('/toko',[TokoController::class,'index'])->name('toko');
Route::get('/ctr',[TokoController::class,'create'])->name('create-toko');
Route::post('str',[TokoController::class,'store'])->name('store-toko');
Route::put('/uptoko/{id}',[TokoController::class,'update'])->name('update-toko');
Route::delete('/toko/{id}',[TokoController::class,'destroy'])->name('hapus-toko');

//Kategori
Route::get('/kate',[KategoriController::class,'index'])->name('kategori');
Route::post('/strkate',[KategoriController::class,'store'])->name('store-kategori');
Route::put('/upkate/{id}',[KategoriController::class,'update'])->name('update-kategori');
Route::delete('/kate/{id}',[KategoriController::class,'delete'])->name('hapus-kategori');

//Gambar
Route::get('/gam',[GambarController::class,'index'])->name('gambar');

