<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Ecommerce extends Controller
{
    public function index(){
        $data = \App\Models\Barang::paginate(10);
        $kategori = \App\Models\KategoriBarang::all();
        return view('user.ecommerce', ['title' => 'E-Commerce', 'barangs' => $data, 'kategori_barangs' => $kategori]);
    }

    public function cekkategori($id){
        $data = \App\Models\Barang::where('kategori_id', $id)->paginate(10);
        $kategori = \App\Models\KategoriBarang::all();
        return view('user.ecommerce', ['title' => 'E-Commerce', 'barangs' => $data, 'kategori_barangs' => $kategori]);
    }
}
