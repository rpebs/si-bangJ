<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
class Barang extends Controller
{
    public function index(){
      $data = \App\Models\Barang::all();
      $kategori = \App\Models\KategoriBarang::all();
      return view('databarang', ['active' => 'barang','barangs'=>$data, 'kategori_barangs'=>$kategori]);
    }

    public function store(Request $request)
    {
        $request->validate([
        'image' => 'required',
        'image.*' => 'mimes:jpeg,jpg,png|max:2048'
        ]);
       if ($request->hasfile('image')) {
            $filename = round(microtime(true) * 1000).'-'.str_replace(' ','-',$request->file('image')->getClientOriginalName());
            $request->file('image')->move(public_path('gambarbarang'), $filename);
            \App\Models\Barang::create(
                    [
                        'kode_barang' => $request->kode_barang,
                        'nama_barang' => $request->nama_barang,
                        'kategori_id' => $request->kategori_id,
                        'harga' => $request->harga,
                        'image' => $filename,
                    ]
                );
            Session::flash('message', 'Data Berhasil Ditambah');
        return redirect()->route('barang');
        }else{
            echo'Gagal';
        }

    }

    // public function edit($id)
    // {
    //     $matkul = \App\Models\KategoriBarang::where('id', $id)->get();

    //     return view('ubahmatkul', ['mata_kuliah' => $matkul, 'title' => 'SI Kampus | Ubah Data Mata Kuliah']);
    // }

    public function update(Request $request)
    {
         $request->validate([

        'image.*' => 'mimes:jpeg,jpg,png|max:2048'
        ]);
         if ($request->hasfile('image')) {
             $image = DB::table('barangs')->where('kode_barang',$request->kode_barang)->first();
	        File::delete('gambarbarang/'.$image->image);
            $filename = round(microtime(true) * 1000).'-'.str_replace(' ','-',$request->file('image')->getClientOriginalName());
            $request->file('image')->move(public_path('gambarbarang'), $filename);
            \App\Models\Barang::where('kode_barang', $request->kode_barang)->update(
                    [
                        'kode_barang' => $request->kode_barang,
                        'nama_barang' => $request->nama_barang,
                        'kategori_id' => $request->kategori_id,
                        'harga' => $request->harga,
                        'image' => $filename,
                    ]
                );

            Session::flash('message', 'Data Berhasil Ditambah');
        return redirect()->route('barang');
        }else{
            $validated = $request->validate([
            'kode_barang' => 'required',
            'nama_barang' => 'required',
            'kategori_id' => 'required',
            'harga' => 'required|integer',
        ]);
         \App\Models\Barang::where('kode_barang', $request->kode_barang)->update($validated);
         Session::flash('message', 'Data Berhasil Diubah');
        return redirect()->route('barang');
        }



    }

    public function delete($kode)
    {
        $image = DB::table('barangs')->where('kode_barang',$kode)->first();
	    File::delete('gambarbarang/'.$image->image);
         \App\Models\Barang::where('kode_barang', $kode)->delete();
            Session::flash('message', 'Data Berhasil Dihapus');
            return redirect()->route('barang');
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
