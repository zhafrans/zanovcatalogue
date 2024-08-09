<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\UserController;
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


//web
Route::get('/', [HomeController::class, 'index'])->name('home');

// Menampilkan form login

Route::post('/login', [AuthController::class, 'login']);

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login')->middleware('guest');


// Menangani proses login
Route::post('/login', [AuthController::class, 'login']);

// Menangani proses logout
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/search', [ProdukController::class, 'search'])->name('search');

Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'cekrole:admin']], function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
    
    // produk
    Route::get('/produk', [ProdukController::class, 'index'])->name('admin.produk');
    Route::get('/produk/create', [ProdukController::class, 'create'])->name('admin.produk.create');
    Route::post('/produk/store', [ProdukController::class, 'store'])->name('admin.produk.store');
    Route::get('/produk/{id}/edit', [ProdukController::class, 'edit'])->name('admin.produk.edit');
    Route::put('/produk/{id}/update', [ProdukController::class, 'update'])->name('admin.produk.update');
    Route::delete('/produk/{id}/destroy', [ProdukController::class, 'destroy'])->name('admin.produk.destroy');
    


    // user
    Route::get('/user', [UserController::class, 'index'])->name('admin.user');
    Route::post('/user/store', [UserController::class, 'store'])->name('admin.user.store');
    Route::put('/user/{id}/update', [UserController::class, 'update'])->name('admin.user.update');
    Route::delete('/user/{id}/destroy', [UserController::class, 'destroy'])->name('admin.user.destroy');


});