<?php

use App\Http\Controllers\KategoriSurat;
use App\Http\Controllers\SuratKeluar;
use App\Http\Controllers\SuratMasuk;
use Illuminate\Support\Facades\Route;

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
    return view('home');
});

//CRUD Surat Masuk
Route::get('surat/masuk', [SuratMasuk::class, 'index'])->name('suratmasuk');
Route::post('surat/masuk/simpan', [SuratMasuk::class, 'store'])->name('simpansuratmasuk');
Route::post('surat/masuk/update', [SuratMasuk::class, 'update'])->name('updatesuratmasuk');
Route::get('surat/masuk/hapus/{kode_surat}', [SuratMasuk::class, 'delete'])->name('hapussuratmasuk');

//CRUD Surat Keluar
Route::get('surat/keluar', [SuratKeluar::class, 'index'])->name('suratkeluar');
Route::post('surat/keluar/simpan', [SuratKeluar::class, 'store'])->name('simpansuratkeluar');
Route::post('surat/keluar/update', [SuratKeluar::class, 'update'])->name('updatesuratkeluar');
Route::get('surat/keluar/hapus/{kode_surat}', [SuratKeluar::class, 'delete'])->name('hapussuratkeluar');



//CRUD Kategori Surat
Route::get('surat/kategori', [KategoriSurat::class, 'index'])->name('kategorisurat');
Route::post('surat/kategori/simpan', [KategoriSurat::class, 'store'])->name('simpankategorisurat');
Route::get('surat/kategori/ubah/{id}', [KategoriSurat::class, 'edit'])->name('editkategorisurat');
Route::post('surat/kategori/update', [KategoriSurat::class, 'update'])->name('updatekategorisurat');
Route::get('surat/kategori/hapus/{id}', [KategoriSurat::class, 'delete'])->name('hapuskategorisurat');


Route::get('barang', function(){
    return view('databarang');
});
Route::get('barang/kategori', function(){
    return view('kategoribarang');
});
Route::get('post/berita', function(){
    return view('berita');
});
Route::get('post/artikel', function(){
    return view('artikel');
});

