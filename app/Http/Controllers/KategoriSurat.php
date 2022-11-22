<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class KategoriSurat extends Controller
{
    public function index(){
      $data = \App\Models\KategoriSurat::all();
      return view('kategorisurat', ['kategori_surats'=>$data]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_kategori' => 'required|unique:kategori_surats|max:255',
        ]);


        \App\Models\KategoriSurat::create($validated);

        Session::flash('message', 'Data Berhasil Ditambah');
        return redirect('surat/kategori');
    }

    public function edit($id)
    {
        $matkul = \App\Models\KategoriSurat::where('id', $id)->get();

        return view('ubahmatkul', ['mata_kuliah' => $matkul, 'title' => 'SI Kampus | Ubah Data Mata Kuliah']);
    }

    public function update(Request $request)
    {
       $validated = $request->validate([
           'nama_kategori' => 'required|max:255',
        ]);

        \App\Models\KategoriSurat::where('id', $request->id)->update($validated);

         Session::flash('message', 'Data Berhasil Diubah');
        return redirect()->route('kategorisurat');
    }

    public function delete($id)
    {

         $where1 = DB::table('kategori_surats')->join('surat_masuks', 'kategori_surats.id', '=', 'surat_masuks.kategori_id')->select('kategori_surats.id')->where('surat_masuks.kategori_id', '=', $id)->get();
         $where2 = DB::table('kategori_surats')->join('surat_keluars', 'kategori_surats.id', '=', 'surat_keluars.kategori_id')->select('kategori_surats.id')->where('surat_keluars.kategori_id', '=', $id)->get();
        if($where1->isNotEmpty() || $where2->isNotEmpty()){
            Session::flash('failed', 'Kategori dipakai dalam data barang');
            return redirect()->route('kategorisurat');
        } else{
            \App\Models\KategoriSurat::where('id', $id)->delete();
            Session::flash('message', 'Data Berhasil Dihapus');
            return redirect()->route('kategorisurat');

        }

    }

}
