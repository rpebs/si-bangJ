<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class SuratKeluar extends Controller
{
    public function index()
    {
        $data = \App\Models\SuratKeluar::all();
        $kategori = \App\Models\KategoriSurat::all();
        return view('suratkeluar', ['active' => 'suratkeluar', 'surat_keluars' => $data, 'kategori_surats' => $kategori]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'file' => 'required',
            'file.*' => 'mimes:doc,docx,jpeg,jpg,csv,txt,xlx,xls,pdf|max:2048'
        ]);
        if ($request->hasfile('file')) {
            $filename = round(microtime(true) * 1000) . '-' . str_replace(' ', '-', $request->file('file')->getClientOriginalName());
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
        } else {
            echo 'Gagal';
        }
    }

    // public function edit($id)
    // {
    //     $matkul = \App\Models\KategoriSurat::where('id', $id)->get();

    //     return view('ubahmatkul', ['mata_kuliah' => $matkul, 'title' => 'SI Kampus | Ubah Data Mata Kuliah']);
    // }

    public function update(Request $request)
    {
        $request->validate([
            'file.*' => 'mimes:doc,docx,jpeg,jpg,csv,txt,xlx,xls,pdf|max:2048'
        ]);
        if ($request->hasfile('file')) {
            $file = DB::table('surat_keluars')->where('kode_surat', $request->kode_surat)->first();
            File::delete('suratkeluar/' . $file->file);
            $filename = round(microtime(true) * 1000) . '-' . str_replace(' ', '-', $request->file('file')->getClientOriginalName());
            $request->file('file')->move(public_path('suratkeluar'), $filename);
            \App\Models\SuratKeluar::where('kode_surat', $request->kode_surat)->update(
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
        } else {
            $validated = $request->validate([
                'kode_surat' => 'required',
                'kategori_id' => 'required',
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
    }

    public function delete($kode)
    {
        $file = DB::table('surat_keluars')->where('kode_surat', $kode)->first();
        File::delete('suratkeluar/' . $file->file);
        \App\Models\SuratKeluar::where('kode_surat', $kode)->delete();
        Session::flash('message', 'Data Berhasil Dihapus');
        return redirect()->route('suratkeluar');
    }

    public function detail($kode)
    {
        $data = \App\Models\SuratKeluar::where('kode_surat', $kode)->get();
        $kategori = \App\Models\KategoriSurat::all();
        return view('detailsuratkeluar', [
            'active' => 'suratkeluar',
            'surat_keluars' => $data,
            'kategori_surats' => $kategori
        ]);
    }
}
