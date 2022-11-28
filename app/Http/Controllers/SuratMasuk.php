<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class SuratMasuk extends Controller
{
    public function index()
    {
        $data = \App\Models\SuratMasuk::all();
        $kategori = \App\Models\KategoriSurat::all();
        return view('suratmasuk', ['active' => 'suratmasuk', 'surat_masuks' => $data, 'kategori_surats' => $kategori]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'file' => 'required',
            'file.*' => 'mimes:doc,docx,jpeg,jpg,csv,txt,xlx,xls,pdf|max:2048'
        ]);
        if ($request->hasfile('file')) {
            $filename = round(microtime(true) * 1000) . '-' . str_replace(' ', '-', $request->file('file')->getClientOriginalName());
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
        } else {
            echo 'Gagal';
        }
    }

    public function update(Request $request)
    {
        $request->validate([
            'file.*' => 'mimes:doc,docx,jpeg,jpg,csv,txt,xlx,xls,pdf|max:2048'
        ]);
        if ($request->hasfile('file')) {
            $file = DB::table('surat_masuks')->where('kode_surat', $request->kode_surat)->first();
            File::delete('suratmasuk/' . $file->file);
            $filename = round(microtime(true) * 1000) . '-' . str_replace(' ', '-', $request->file('file')->getClientOriginalName());
            $request->file('file')->move(public_path('suratmasuk'), $filename);
            \App\Models\SuratMasuk::where('kode_surat', $request->kode_surat)->update(
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
        } else {
            $validated = $request->validate([
                'kode_surat' => 'required',
                'kategori_id' => 'required',
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
    }

    public function delete($kode)
    {
        $file = DB::table('surat_masuks')->where('kode_surat', $kode)->first();
        File::delete('suratmasuk/' . $file->file);
        \App\Models\SuratMasuk::where('kode_surat', $kode)->delete();
        Session::flash('message', 'Data Berhasil Dihapus');
        return redirect()->route('suratmasuk');
    }

    public function detail($kode)
    {
        $data = \App\Models\SuratMasuk::where('kode_surat', $kode)->get();
        $kategori = \App\Models\KategoriSurat::all();
        return view('detailsuratmasuk', [
            'active' => 'suratmasuk',
            'surat_masuks' => $data,
            'kategori_surats' => $kategori
        ]);
    }
}
