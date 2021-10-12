<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\SupplierController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('index');

// kategori
Route::get('/index', [KategoriController::class,'index'])->name('kategori_index');
Route::get('/create', [KategoriController::class,'create'])->name('kategori_create');
Route::post('/tambah', [KategoriController::class,'tambah_kategori'])->name('tambah_kategori');
Route::delete('/hapus_kategori/{id}', [KategoriController::class,'destroy'])->name('hapus_kategori');
Route::get('/edit_kategori/{id}', [KategoriController::class,'edit'])->name('edit_kategori');
Route::put('/update_kategori/{id}', [KategoriController::class,'update'])->name('update_kategori');


// barangs
Route::get('/barang_index', [BarangController::class,'index'])->name('barang_index');
Route::get('/create_barang', [BarangController::class,'create'])->name('barang_create');
Route::post('/tambah_buku', [BarangController::class,'tambah_buku'])->name('tambah_buku');
Route::delete('/hapus_barang/{id}', [BarangController::class,'destroy'])->name('hapus_barang');
Route::get('/detail_barang/{id}', [BarangController::class,'detail_barang'])->name('detail_barang');
Route::get('/edit_barang/{id}', [BarangController::class,'edit'])->name('edit_barang');
Route::put('/update_barang/{id}', [BarangController::class,'update'])->name('update_barang');

// supplier
Route::get('/supplier_index', [SupplierController::class,'index'])->name('supplier_index');
Route::get('/create_supplier', [SupplierController::class,'create'])->name('supplier_create');
Route::post('/tambah_supplier', [SupplierController::class,'tambah_supplier'])->name('tambah_supplier');
Route::delete('/hapus_supplier/{id}', [SupplierController::class,'destroy'])->name('hapus_supplier');
Route::get('/edit_supplier/{id}', [SupplierController::class,'edit'])->name('edit_supplier');
Route::put('/update_supplier/{id}', [SupplierController::class,'update'])->name('update_supplier');
