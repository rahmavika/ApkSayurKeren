<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\KeranjangController;
use App\Http\Controllers\PengelolaController;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\StokController;
use App\Models\Produk;

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/', function () {
//     return view('home');
// });

Route::get('/', [HomeController::class, 'index'])->name('home');

// Route::get('/dashboard', function () {
//     return view('admin.dashboard');
// });

Route::get('/dashboard', [ProdukController::class, 'jumlahProduk'])->name('dashboard');


Route::get('/semuaproduk', function () {
    // Ambil semua produk beserta stoknya
    $produks = Produk::with('stok')->get();
    // Kirim data ke view
    return view('landing_page.semuaproduk', compact('produks'));
});


Route::get('/promo', function () {
    return view('landing_page.promo');
});

Route::get('/terlaris', function () {
    return view('landing_page.terlaris');
});

Route::get('/kategori', function () {
    return view('landing_page.kategori');
});
// Route::get('/kategori', [KategoriController::class, 'index']);


Route::get('/register', [RegisterController::class, 'index']);
Route::post('/register', [RegisterController::class, 'store'])->name('register.store');


Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/detailpelanggan', function () {
    return view('pelanggan.detailpelanggan');
});

// Route::post('/update-profile', [PenggunaController::class, 'update'])->name('update-profile');
Route::get('/editprofile', function () {
    return view('pelanggan.editprofile');
});

Route::get('/edit-profile', [PenggunaController::class, 'edit'])->name('edit-profile');
Route::put('/edit-profile', [PenggunaController::class, 'update'])->name('update-profile');


Route::middleware(['auth'])->group(function () {
    Route::resource('keranjangs', KeranjangController::class);
});

// web.php
Route::post('/keranjang/tambah/{id}', [KeranjangController::class, 'tambah'])->middleware('auth');
Route::get('/keranjang', [KeranjangController::class, 'show'])->name('keranjang.show');

Route::resource('/admin-kategori', KategoriController::class);
Route::resource('/admin-stok', StokController::class);
Route::get('/admin-stok/{id}/tambahStok', [StokController::class, 'tambahStok'])->name('admin-stok.tambahStok');

Route::resource('/admin-produk', ProdukController::class);

Route::get('/admin-pelanggan', [PenggunaController::class, 'index'])->name('admin.admin-pelanggan.index');
Route::delete('/admin-pelanggan/{id}', [PenggunaController::class, 'destroy'])->name('admin.admin-pelanggan.destroy');

Route::resource('/admin-pengelola', PengelolaController::class);













