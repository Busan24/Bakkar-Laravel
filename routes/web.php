<?php

use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\KontenController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Authentication\AuthController;
use App\Http\Controllers\User\HomeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Rute untuk pengguna yang belum login
Route::middleware('guest')->group(function () {
    Route::get('/register', [AuthController::class, 'registrasi'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'postLogin']);
});

// Rute yang hanya bisa diakses oleh pengguna yang sudah login
Route::middleware('auth')->group(function () {
    Route::get('/produk', [ProductController::class, 'index'])->name('produk');
    Route::get('createproduk', [ProductController::class, 'create'])->name('create');
    Route::post('createproduk', [ProductController::class, 'store'])->name('store');
    Route::get('/produk/{id}/edit', [ProductController::class, 'edit'])->name('edit');
    Route::put('/produk/{id}', [ProductController::class, 'update'])->name('produk.update');
    Route::delete('/produk/{id}', [ProductController::class, 'destroy'])->name('produk.delete');
    Route::get('/user', [UserController::class, 'index'])->name('user');
    Route::delete('/user/{id}', [UserController::class, 'destroy'])->name('user_delete');
    Route::get('/category', [CategoryController::class, 'index'])->name('category');
    Route::post('/category', [CategoryController::class, 'store'])->name('category.store');
    Route::delete('/category/{id}', [CategoryController::class, 'destroy'])->name('category.destroy');
    Route::put('/category/{id}', [CategoryController::class, 'update'])->name('category.update');
    Route::get('/konten', [KontenController::class, 'index'])->name('konten');
    Route::post('/konten/store', [KontenController::class, 'store'])->name('konten.store');
    Route::put('/konten/{id}', [KontenController::class, 'update'])->name('konten.update');
    Route::delete('/konten/{id}', [KontenController::class, 'destroy'])->name('konten.destroy');
    Route::get('/banner', [BannerController::class, 'index'])->name('banner');
    Route::post('/banner/store', [BannerController::class, 'store'])->name('banner.store');
    Route::put('/banner/{id}', [BannerController::class, 'update'])->name('banner.update');
    Route::delete('/banner/{id}', [BannerController::class, 'destroy'])->name('banner.destroy');
});

// Rute untuk logout
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');





