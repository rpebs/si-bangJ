<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SuratKeluar extends Controller
{
     public function index(){
       $data = \App\Models\SuratKeluar::all();
       $kategori = \App\Models\KategoriSurat::all();
        return view('suratkeluar', ['surat_keluars' => $data, 'kategori_surats' => $kategori]);
    }

    public function store(Request $request)
    {
         $request->validate([
        'file' => 'required',
        'file.*' => 'mimes:doc,docx,jpeg,jpg,csv,txt,xlx,xls,pdf|max:2048'
        ]);
       if ($request->hasfile('file')) {
            $filename = round(microtime(true) * 1000).'-'.str_replace(' ','-',$request->file('file')->getClientOriginalName());
            $request->file('file')->move(public_path('suratkeluar'), $filename);
            \App\Models\SuratKeluar::create(
                    [
                        'kode_surat' => $request->kode_surat,
                        'kategori_id' => $request->kategori_id,
                        'tgl_keluar' => $request->tgl_keluar,
                        'tujuan' => $request->tujuan,
                        'perihal' => $request->perihal,
                        'tempat' => $request->tempat,
                        'tgl_mulai' => $request->tgl_mulai,
                        'tgl_selesai' => $request->tgl_selesai,
                        'keterangan' => $request->keterangan,
                        'file' => $filename,
                    ]
                );
            Session::flash('message', 'Data Berhasil Ditambah');
        return redirect()->route('suratkeluar');
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
            'tgl_keluar' => 'required|date',
            'tujuan' => 'required',
            'perihal' => 'required',
            'tempat' => 'required',
            'tgl_mulai' => 'required|date',
            'tgl_selesai' => 'required|date',
            'keterangan' => 'required',
        ]);

        \App\Models\SuratKeluar::where('kode_surat', $request->kode_surat)->update($validated);

         Session::flash('message', 'Data Berhasil Diubah');
        return redirect()->route('suratkeluar');
    }

     public function delete($kode)
    {
         $data = \App\Models\SuratKeluar::where('kode_surat', $kode)->delete();
            Session::flash('message', 'Data Berhasil Dihapus');
            return redirect()->route('suratkeluar');
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