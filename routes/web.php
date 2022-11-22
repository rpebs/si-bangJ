<?php

use App\Http\Controllers\KategoriSurat;
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

Route::get('surat/masuk', function (){
    return view('suratmasuk');
});
Route::get('surat/keluar', function (){
    return view('suratkeluar');
});

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

