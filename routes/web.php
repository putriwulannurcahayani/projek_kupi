<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\signupController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\dashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProdukController;


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

Route::get('/', function () {
    return view('welcome');
}); 

Route::middleware('guest')->group(function () {
    Route::get('/login', [loginController::class, 'index'])->name('viewLogin');
    Route::post('/login', [loginController::class, 'login'])->name('login');
});


Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [dashboardController::class,'index']);
    Route::post('/logout', [signupController::class,'logout'])->name('logout');
    Route::get('/profile', [ProfileController::class,'index'])->name('profile');
    Route::post('/signup', [signupController::class, 'register'])->name('signup');
    Route::get("/tambah-pegawai",[signupController::class,'index'])->name('tambah-pegawai');
    Route::post("/tambah-pegawai",[signupController::class,'register'])->name('tambah-pegawai.store');
    Route::put('/edit-profile', [ProfileController::class,'update'])->name('editProfile');
    Route::get('/produks/cetak',[ProdukController::class, 'cetak'])->name('produks.cetak');

    Route::get('/produks/laporan',[ProdukController::class, 'laporan'])->name('produks.laporan');
    Route::get('/produks/create', 'ProdukController@create')->name('produks.create');
    Route::get('/produks', [ProdukController::class, 'index'])->name('produks.index');
    Route::get('/produks/{id}', [ProdukController::class, 'show'])->name('produks.show');
    Route::get('/produks/{id}/edit', [ProdukController::class, 'edit'])->name('produks.edit');
    Route::delete('/produks/{id}', [ProdukController::class, 'destroy'])->name('produks.destroy');
    Route::get('/produk/create', [ProdukController::class, 'createproduk'])->name('produks.create');
    Route::post('/produks/store', [ProdukController::class, 'store'])->name('produks.store');
    Route::get('/produk/{produk}/edit', [ProdukController::class, 'edit'])->name('produk.edit');
    Route::put('/produk/{produk}', [ProdukController::class, 'update'])->name('produk.update');
});






