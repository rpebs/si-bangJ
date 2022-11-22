<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class SuratMasuk extends Controller
{
    public function index(){
       $data = \App\Models\SuratMasuk::all();
       $kategori = \App\Models\KategoriSurat::all();
        return view('suratmasuk', ['surat_masuks' => $data, 'kategori_surats' => $kategori]);
    }

    public function store(Request $request)
    {
         $request->validate([
        'file' => 'required',
        'file.*' => 'mimes:doc,docx,jpeg,jpg,csv,txt,xlx,xls,pdf|max:2048'
        ]);
       if ($request->hasfile('file')) {
            $filename = round(microtime(true) * 1000).'-'.str_replace(' ','-',$request->file('file')->getClientOriginalName());
            $request->file('file')->move(public_path('suratmasuk'), $filename);
            \App\Models\SuratMasuk::create(
                    [
                        'kode_surat' => $request->kode_surat,
                        'kategori_id' => $request->kategori_id,
                        'tgl_masuk' => $request->tgl_masuk,
                        'pengirim' => $request->pengirim,
                        'perihal' => $request->perihal,
                        'tempat' => $request->tempat,
                        'tgl_mulai' => $request->tgl_mulai,
                        'tgl_selesai' => $request->tgl_selesai,
                        'keterangan' => $request->keterangan,
                        'file' => $filename,
                    ]
                );
            Session::flash('message', 'Data Berhasil Ditambah');
        return redirect()->route('suratmasuk');
        }else{
            echo'Gagal';
        }



    }

    // public function edit($id)
    // {
    //     $matkul = \App\Models\KategoriSurat::where('id', $id)->get();

    //     return view('ubahmatkul', ['mata_kuliah' => $matkul, 'title' => 'SI Kampus | Ubah Data Mata Kuliah']);
    // }

    public function update(Request $request)
    {
       $validated = $request->validate([
            'kode_surat' => 'required',
            'kategori_id' =>'required',
            'tgl_masuk' => 'required|date',
            'pengirim' => 'required',
            'perihal' => 'required',
            'tempat' => 'required',
            'tgl_mulai' => 'required|date',
            'tgl_selesai' => 'required|date',
            'keterangan' => 'required',
        ]);

        \App\Models\SuratMasuk::where('kode_surat', $request->kode_surat)->update($validated);

         Session::flash('message', 'Data Berhasil Diubah');
        return redirect()->route('suratmasuk');
    }

     public function delete($kode)
    {
         $data = \App\Models\SuratMasuk::where('kode_surat', $kode)->delete();
            Session::flash('message', 'Data Berhasil Dihapus');
            return redirect()->route('suratmasuk');
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
