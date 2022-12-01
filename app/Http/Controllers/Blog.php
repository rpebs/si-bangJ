<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\KategoriBarang;
use App\Models\Postingan;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class Blog extends Controller
{
    public function index()
    {
        $first = Postingan::orderBy('created_at', 'desc')->first();
        $slide = Postingan::orderby('created_at', 'desc')->get()->skip(1)->take(5);
        $berita = Postingan::all();
        $produk = Barang::orderby('created_at', 'desc')->get()->take(4);
        $katbarang = KategoriBarang::all();

        return view('user.home', [
            'first' => $first,
            'slide' => $slide,
            'postingan' => $berita,
            'barangs' => $produk,
            'kategori_barangs' => $katbarang,
            'title' => 'Web Kepanduan | Blog', 'active' => 'home'
        ]);
    }
}
