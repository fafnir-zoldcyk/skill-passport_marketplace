<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\GambarController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\TokoController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/htrh', function () {
    return view('welcome');
});
//Login
Route::get('/login',[UserController::class,'login'])->name('login');
Route::post('/login/auth',[UserController::class,'auth'])->name('login.auth');
Route::get('/logout',[UserController::class,'logout'])->name('logout');

//Register
Route::get('/regis',[UserController::class,'regis'])->name('register');
Route::post('/register',[UserController::class,'register'])->name('regiter-store');

//landing page
Route::get('/',[UserController::class,'beranda'])->name('beranda');

//Produk
Route::get('/produk',[ProdukController::class,'view'])->name('produk-view');

//Kategori
Route::get('/kategori',[KategoriController::class,'view'])->name('kategori-view');

//Toko
Route::get('/toko',[TokoController::class,'view'])->name('toko-view');
Route::middleware(['member'])->group(function () {
    //Member
    Route::get('/member',[MemberController::class,'member'])->name('member');
    //Produk
    Route::get('/prod',[MemberController::class,'tampilan'])->name('member-produk');
    Route::post('/stopro',[ProdukController::class,'store'])->name('store-produk');
    Route::put('/uppro/{id}',[ProdukController::class,'update'])->name('update-produk');
    Route::delete('/prod/{id}',[ProdukController::class,'hapus'])->name('hapus-prod');
});
Route::middleware(['admin'])->group(function () {
    //Admin
    Route::get('/admin',[AdminController::class,'admin'])->name('admin');

    //User
    Route::get('/user',[UserController::class,'index'])->name('user');
    Route::post('/usestore',[UserController::class,'store'])->name('user-store');
    Route::put('/useup/{id}',[UserController::class,'update'])->name('user-update');
    Route::delete('/user/{id}',[UserController::class,'delete'])->name('hapus-user');

    //Produk
    Route::get('/pro',[AdminController::class,'index'])->name('produk');
    Route::delete('/pro/{id}',[ProdukController::class,'delete'])->name('hapus-produk');



    //Toko
    Route::get('/toko',[AdminController::class,'indextok'])->name('toko');
    Route::post('str',[TokoController::class,'store'])->name('store-toko');
    Route::put('/uptoko/{id}',[TokoController::class,'update'])->name('update-toko');
    Route::delete('/toko/{id}',[TokoController::class,'destroy'])->name('hapus-toko');
    Route::get('/approve/{id}',[TokoController::class,'approve'])->name('approve-toko');



    //Kategori
    Route::get('/kate',[AdminController::class,'indexkate'])->name('kategori');
    Route::post('/strkate',[KategoriController::class,'store'])->name('store-kategori');
    Route::put('/upkate/{id}',[KategoriController::class,'update'])->name('update-kategori');
    Route::delete('/kate/{id}',[KategoriController::class,'delete'])->name('hapus-kategori');

    //Gambar
    Route::get('/gam',[GambarController::class,'index'])->name('gambar');
});




