<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Dashboard extends Controller
{
    public function index(){
        $suratmasuk = \App\Models\SuratMasuk::all();
        $barang = \App\Models\Barang::all();
        $suratkeluar = \App\Models\SuratKeluar::all();
        return view('home', ['active' => 'dashboard','surat_masuks' => $suratmasuk, 'surat_keluars' => $suratkeluar, 'barangs' => $barang]);
    }
}
