<?php

use App\Http\Controllers\Artikel;
use App\Http\Controllers\Barang;
use App\Http\Controllers\Berita;
use App\Http\Controllers\Dashboard;
use App\Http\Controllers\Ecommerce;
use App\Http\Controllers\KategoriBarang;
use App\Http\Controllers\KategoriSurat;
use App\Http\Controllers\SuratKeluar;
use App\Http\Controllers\SuratMasuk;
use App\Models\Postingan;
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

Route::get('/', [Dashboard::class, 'index'])->name('dashboard');



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

///CRUD Kategori Barang
Route::get('barang/kategori', [KategoriBarang::class, 'index'])->name('kategoribarang');
Route::post('barang/kategori/simpan', [KategoriBarang::class, 'store'])->name('simpankategoribarang');
Route::get('barang/kategori/ubah/{id}', [KategoriBarang::class, 'edit'])->name('editkategoribarang');
Route::post('barang/kategori/update', [KategoriBarang::class, 'update'])->name('updatekategoribarang');
Route::get('barang/kategori/hapus/{id}', [KategoriBarang::class, 'delete'])->name('hapuskategoribarang');

//CRUD Barang
Route::get('barang', [Barang::class, 'index'])->name('barang');
Route::post('barang/simpan', [Barang::class, 'store'])->name('simpanbarang');
Route::get('barang/ubah/{id}', [Barang::class, 'edit'])->name('editbarang');
Route::post('barang/update', [Barang::class, 'update'])->name('updatebarang');
Route::get('barang/hapus/{id}', [Barang::class, 'delete'])->name('hapusbarang');

//CRUD Artikel
Route::get('post/artikel', [Artikel::class, 'index'])->name('artikel');
Route::post('post/artikel/simpan', [Artikel::class, 'store'])->name('simpanartikel');
Route::post('post/artikel/edit', [Artikel::class, 'update'])->name('updateartikel');
Route::get('post/artikel/hapus/{slug}', [Artikel::class, 'delete'])->name('hapusartikel');

//CRUD Artikel
Route::get('post/berita', [Berita::class, 'index'])->name('berita');
Route::post('post/berita/simpan', [Berita::class, 'store'])->name('simpanberita');
Route::post('post/berita/edit', [Berita::class, 'update'])->name('updateberita');
Route::get('post/berita/hapus/{slug}', [Berita::class, 'delete'])->name('hapusberita');

Route::get('ecommerce', [Ecommerce::class, 'index'])->name('ecommerce');

