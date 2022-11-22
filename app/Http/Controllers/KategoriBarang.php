<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class KategoriBarang extends Controller
{
    public function index(){
      $data = \App\Models\KategoriBarang::all();
      return view('kategoribarang', ['kategori_barangs'=>$data]);
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
         $matkul = \App\Models\KategoriBarang::where('id', $id)->delete();
            Session::flash('message', 'Data Berhasil Dihapus');
            return redirect()->route('kategoribarang');
        // $condition = DB::table('mata_kuliah')->where('kode_matkul', '=', $kode)->get('id');
        // $where = DB::table('mata_kuliah')->join('jadwal', 'mata_kuliah.id', '=', 'jadwal.matkul_id')->select('mata_kuliah.id')->where('jadwal.matkul_id', '=', $condition->implode('id'))->get();
        // if($where->isNotEmpty()){
        //     Session::flash('failed', 'Matkul Masuk Kedalam Jadwal');
        //     return redirect()->route('tampilmatkul');
        // } else{
        //     $matkul = MataKuliahModel::where('kode_matkul', $kode)->delete();
        //     Session::flash('message', 'Data Berhasil Dihapus');
        //     return redirect()->route('tampilmatkul');
        // }

    }
}
