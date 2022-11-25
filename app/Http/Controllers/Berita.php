<?php

namespace App\Http\Controllers;

use App\Models\Postingan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;

class Berita extends Controller
{
    public function index()
    {
        $data = \App\Models\Postingan::where('kategori', 'berita')->get();

        return view('berita', [
            'active' => 'berita',
            'postingans' => $data
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required',
            'image.*' => 'mimes:jpeg,jpg,png|max:2048'
        ]);
        if ($request->hasfile('image')) {
            $filename = round(microtime(true) * 1000) . '-' . str_replace(' ', '-', $request->file('image')->getClientOriginalName());
            $request->file('image')->move(public_path('gambarpostingan'), $filename);
            Postingan::create(
                [
                    'judul' => $request->judul,
                    'slug' => Str::slug($request->judul, '-'),
                    'excerpt' => Str::limit(strip_tags($request->post), 100, '...'),
                    'kategori' => $request->kategori,
                    'post' => $request->post,
                    'tgl_post' => $request->tgl_post,
                    'image' => $filename,
                ]
            );
            Session::flash('message', 'Data Berhasil Ditambahkan!');
            return redirect()->route('berita');
        } else {
            \App\Models\Postingan::create(
                [
                    'judul' => $request->judul,
                    'slug' => Str::slug($request->judul, '-'),
                    'excerpt' => $request->excerpt,
                    'kategori' => $request->kategori,
                    'tgl_post' => $request->tgl_post,
                    'post' => $request->post,
                ]
            );
            Session::flash('message', 'Data Berhasil Ditambah');
            return redirect()->route('barang');
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
            $image = DB::table('postingans')->where('id', $request->id)->first();
            File::delete('gambarpostingan/' . $image->image);
            $filename = round(microtime(true) * 1000) . '-' . str_replace(' ', '-', $request->file('image')->getClientOriginalName());
            $request->file('image')->move(public_path('gambarpostingan'), $filename);
            Postingan::where('id', $request->id)->update(
                [
                    'judul' => $request->judul,
                    'slug' => $request->slug,
                    'excerpt' => Str::limit(strip_tags($request->post), 100, '...'),
                    'kategori' => $request->kategori,
                    'post' => $request->post,
                    'tgl_post' => $request->tgl_post,
                    'image' => $filename,
                ]
            );
            Session::flash('message', 'Data Berhasil Ubah');
            return redirect()->route('berita');
        } else {
            \App\Models\Postingan::where('id', $request->id)->update(
                [
                    'judul' => $request->judul,
                    'slug' => $request->slug,
                    'excerpt' => Str::limit(strip_tags($request->post), 100, '...'),
                    'kategori' => $request->kategori,
                    'tgl_post' => $request->tgl_post,
                    'post' => $request->post,
                ]
            );
            Session::flash('message', 'Data Berhasil Ubah');
            return redirect()->route('berita');
        }
    }

    public function delete($slug)
    {
        $image = DB::table('postingans')->where('slug', $slug)->first();
        File::delete('gambarpostingan/' . $image->image);
        \App\Models\Postingan::where('slug', $slug)->delete();
        Session::flash('message', 'Data Berhasil Dihapus');
        return redirect()->route('berita');
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

    public function tampil()
    {
        $data = \App\Models\Postingan::where('kategori', 'berita')->orderBy('tgl_post', 'desc')->paginate(10);
        return view('user.berita', ['title' => 'WEB | Daftar Berita', 'active' => 'berita', 'postingans' => $data]);
    }

    public function baca($slug)
    {
        $data = Postingan::where('slug', $slug)->first();
        return view('user.bacaberita', [
            'title' => 'WEB | Baca Postingan',
             'active' => 'berita',
             'postingans' => $data
            ]);
    }

    public function cari(Request $request)
    {
        $cari = $request->judul;
        $data = \App\Models\Postingan::where('judul', 'like', "%" . $cari . "%", 'and', 'kategori', 'berita')->orderBy('tgl_post', 'desc')->paginate(10);
        return view('user.berita', ['title' => 'WEB | Daftar Berita', 'active' => 'berita', 'postingans' => $data]);
    }

    public function cekSlug(Request $request)
    {
        $slug = SlugService::createSlug(Postingan::class, 'slug', $request->judul);

        return response()->json(['slug' => $slug]);
    }
}
