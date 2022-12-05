<?php

namespace App\Http\Controllers;

use App\Models\Kegiatan;
use App\Models\SuratMasuk;
use App\Models\SuratKeluar;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class Calendar extends Controller
{
    public function getEvent()
    {

        $events = SuratKeluar::all();
        $event = SuratMasuk::all();


        return view('agenda', [
            'events' => $events,
            'event' => $event,
            'active' => 'agenda'
        ]);
    }


    public function getKegiatan()
    {
        return view('kegiatan', [
            'data' => Kegiatan::all(),
            'active' => 'kegiatan'
        ]);
    }



    public function add_kegiatan(Request $request)
    {
        $val = $request->validate([
            'tgl_kegiatan' => 'required|date',
            'image' => 'required',
            'image.*' => 'mimes:jpeg,jpg,png|max:2048'
        ]);
        if ($request->hasfile('image')) {
            $filename = round(microtime(true) * 1000) . '-' . str_replace(' ', '-', $request->file('image')->getClientOriginalName());
            $request->file('image')->move(public_path('gambarpostingan'), $filename);
            \App\Models\Kegiatan::create(
                [
                    'nama_kegiatan' => $request->nama_kegiatan,
                    'deskripsi' => $request->deskripsi,
                    'tempat' => $request->tempat,
                    'tgl_kegiatan' => $val['tgl_kegiatan'],
                    'image' => $filename,
                ]
            );
            Session::flash('message', 'Kegiatan Berhasil Ditambah');
            return redirect()->route('kegiatan');
        } else {
            echo 'Gagal';
        }
    }

    public function edit_kegiatan(Request $request)
    {
        $val = $request->validate([
            'tgl_kegiatan' => 'required|date',
            'image.*' => 'mimes:jpeg,jpg,png|max:2048'
        ]);
        if ($request->hasfile('image')) {
            $image = DB::table('kegiatans')->where('id', $request->id)->first();
            File::delete('gambarpostingan/' . $image->image);
            $filename = round(microtime(true) * 1000) . '-' . str_replace(' ', '-', $request->file('image')->getClientOriginalName());
            $request->file('image')->move(public_path('gambarpostingan'), $filename);
            \App\Models\Kegiatan::where('id', $request->id)->update(
                [

                    'nama_kegiatan' => $request->nama_kegiatan,
                    'deskripsi' => $request->deskripsi,
                    'tempat' => $request->tempat,
                    'tgl_kegiatan' => $val['tgl_kegiatan'],
                    'image' => $filename,
                ]
            );

            Session::flash('message', 'Data Kegiatan Berhasil Diubah');
            return redirect()->route('kegiatan');
        } else {
            $validated = $request->validate([
                'nama_kegiatan' => 'required',
                'deskripsi' => 'required',
                'tempat' => 'required',
                'tgl_kegiatan' => 'required|date'
            ]);
            \App\Models\Kegiatan::where('id', $request->id)->update($validated);
            Session::flash('message', 'Data Berhasil Diubah');
            return redirect()->route('kegiatan');
        }
    }

    public function delete_kegiatan($id)
    {
        $image = DB::table('kegiatans')->where('id', $id)->first();
        File::delete('gambarpostingan/' . $image->image);
        \App\Models\Kegiatan::where('id', $id)->delete();
        Session::flash('message', 'Data Berhasil Dihapus');
        return redirect()->route('kegiatan');
    }

    public function baca($id){
        $data = \App\Models\Kegiatan::where('id', $id)->first();
        return view('user.bacakegiatan', ['title' => 'WEB | Baca Artikel' ,'active' => 'artikel','kegiatans'=>$data]);
    }
}
