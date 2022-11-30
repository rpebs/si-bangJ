<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class KategoriBarang extends Controller
{
    public function index(){
      $data = \App\Models\KategoriBarang::all();
      return view('kategoribarang', ['active' => 'kategoribarang','kategori_barangs'=>$data]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_kategori' => 'required|unique:kategori_barangs|max:255',
        ]);


        \App\Models\KategoriBarang::create($validated);

        Session::flash('message', 'Data Berhasil Ditambah');
        return redirect('barang/kategori');
    }

    // public function edit($id)
    // {
    //     $matkul = \App\Models\KategoriBarang::where('id', $id)->get();

    //     return view('ubahmatkul', ['mata_kuliah' => $matkul, 'title' => 'SI Kampus | Ubah Data Mata Kuliah']);
    // }

    public function update(Request $request)
    {
       $validated = $request->validate([
           'nama_kategori' => 'required|max:255',
        ]);

        \App\Models\KategoriBarang::where('id', $request->id)->update($validated);

         Session::flash('message', 'Data Berhasil Diubah');
        return redirect()->route('kategoribarang');
    }

    public function delete($id)
    {
        $where = DB::table('kategori_barangs')->join('barangs', 'kategori_barangs.id', '=', 'barangs.kategori_id')->select('kategori_barangs.id')->where('barangs.kategori_id', '=', $id)->get();
        if($where->isNotEmpty()){
            Session::flash('failed', 'Kategori dipakai dalam data barang');
            return redirect()->route('kategoribarang');
        } else{
           \App\Models\KategoriBarang::where('id', $id)->delete();
            Session::flash('message', 'Data Berhasil Dihapus');
            return redirect()->route('kategoribarang');

        }

    }
}
