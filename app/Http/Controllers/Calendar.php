<?php

namespace App\Http\Controllers;

use App\Models\Kegiatan;
use App\Models\SuratMasuk;
use App\Models\SuratKeluar;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
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
        $validatedData = $request->validate([
            'nama_kegiatan' => 'required|max:255',
            'image' => 'required|image|file|max:2028',
            'deskripsi' => 'required',
            'tgl_kegiatan' => 'required|date',
            'tempat' => 'required'
        ]);

        if ($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('kegiatan');
        }

        Kegiatan::create($validatedData);

        return redirect('/admin-kegiatan')->with('message', 'Data Kegiatan berhasil masuk!');
    }

    public function edit_kegiatan(Request $request)
    {
        $validatedData = $request->validate([
            'nama_kegiatan' => 'required|max:255',
            'image' => 'image|file|max:2028',
            'deskripsi' => 'required',
            'tgl_kegiatan' => 'required|date',
            'tempat' => 'required'
        ]);

        if ($request->file('image')) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }

            $validatedData['image'] = $request->file('image')->store('kegiatan');
        }

        Kegiatan::where('id', $request->id)->update($validatedData);

        return redirect('/admin-kegiatan')->with('message', 'Data berhasil diupdate!');
    }

    public function delete_kegiatan(Request $request)
    {
        $hm = Kegiatan::all()->where('id', $request->id);

        foreach ($hm as $h) {
            Storage::delete($h->image);
        }
        Kegiatan::destroy($request->id);

        return redirect('/admin-kegiatan')->with('message', 'Data berhasil dihapus!');
    }
}
