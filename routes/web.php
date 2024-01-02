<?php

use App\Http\Controllers\ArusKasController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\signupController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\dashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\PendapatanController;
use App\Http\Controllers\BebanController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\LabaRugiController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\RiwayatController;


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
    Route::get('/register', [RegisterController::class, 'index'])->name('register.index');
    Route::post('/register', [RegisterController::class, 'register'])->name('register');
});



Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [dashboardController::class,'index'])->name('dashboard');
    Route::get('/logout', [signupController::class,'logout'])->name('logout');
    Route::get('/profile', [ProfileController::class,'index'])->name('profile');
    Route::post('/signup', [signupController::class, 'register'])->name('signup');
    Route::get("/tambah-pegawai",[signupController::class,'index'])->name('tambah-pegawai');
    Route::get("/pegawai",[signupController::class,'daftarPegawai'])->name('daftarPegawai');
    Route::post("/tambah-pegawai",[signupController::class,'register'])->name('tambah-pegawai.store');
    Route::get("/print-pegawai",[signupController::class,'print'])->name('print-pegawai');
    Route::delete('/pegawai/{id}', [signupController::class, 'destroy'])->name('pegawai.destroy');
    Route::put('/edit-profile', [ProfileController::class,'update'])->name('editProfile');
    Route::get('/produks/cetak',[ProdukController::class, 'cetak'])->name('produks.cetak');
    Route::get('/profileedit', [ProfileController::class,'profile'])->name('profileedit');
    Route::get('/ganti-password', [ProfileController::class,'password'])->name('ganti-password');
    Route::post('/gantipassword', [ProfileController::class,'gantiPassword'])->name('gantiPassword');

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

    Route::get('/pendapatans', [PendapatanController::class, 'index'])->name('pendapatans');
    Route::post('/pendapatan/store', [PendapatanController::class, 'store'])->name('pendapatan.store');

    Route::get('/beban', [BebanController::class, 'index'])->name('beban.index');
    Route::get('/beban/{id}', [BebanController::class, 'show'])->name('beban.show');
    Route::get('/beban/create', [BebanController::class, 'createbeban'])->name('beban.create');
    Route::post('/beban/store', [BebanController::class, 'store'])->name('beban.store');
    Route::resource('/kategori',KategoriController::class);

    Route::get('/riwayat',[RiwayatController::class, 'index'])->name('riwayat.index');
    Route::get('/riwayatbeban',[RiwayatController::class, 'indexBeban'])->name('riwayatbeban');

    Route::get('/labarugi', [LabaRugiController::class, 'hitungLabaRugi'])->name('labarugi.index');
    Route::get('/aruskas', [ArusKasController::class, 'index'])->name('aruskas.index');
    Route::get('/pegawais/laporan', [SignupController::class, 'laporan'])->name('pegawais.laporan');

    
});






