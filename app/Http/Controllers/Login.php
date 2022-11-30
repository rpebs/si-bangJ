<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class Login extends Controller
{

    public function login()
    {
        return view('login');
    }

    public function login_action(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);
        if (Auth::attempt(['username' => $request->username, 'password' => $request->password])) {
            $request->session()->regenerate();
            return redirect()->intended('/');
        }

        return back()->withErrors([
            'password' => 'Wrong username or password',
        ]);
    }

    public function edit(){
        $sesi = Auth::user()->username;
        $data = User::where('username', $sesi)->get();

        return view('editadmin',['title' => 'Edit Profil Admin', 'active' => 'dashboard', 'admin' => $data]);
    }


    public function update(Request $request)
    {
        $sesi = Auth::user()->username;
        $pass = User::where('username',$sesi)->first();
        $val  =  $request->validate([
            'new_password' => 'min:5',
            'gambar.*' => 'mimes:jpeg,jpg,png|max:2048'
        ]);

        if($request->filled('old_password')){
            if(Hash::check($request->old_password, $pass->password)){
             if ($request->hasfile('gambar')) {
                $gambar = DB::table('users')->where('username', $sesi)->first();
                File::delete('gambaradmin/' . $gambar->gambar);
                $filename = round(microtime(true) * 1000) . '-' . str_replace(' ', '-', $request->file('gambar')->getClientOriginalName());
                $request->file('gambar')->move(public_path('gambaradmin'), $filename);
                \App\Models\User::where('username', $sesi)->update(
                    [
                        'nama' => $request->nama,
                        'username' => $request->username,
                        'password' => Hash::make($val['new_password']),
                        'gambar' => $filename
                    ]
            );

            Session::flash('message', 'Data Berhasil Ditambah');
            return redirect()->route('editadmin');
            } else {
                \App\Models\User::where('username', $sesi)->update([
                        'nama' => $request->nama,
                        'username' => $request->username,
                        'password' => Hash::make($val['new_password']),
                ]);
                Session::flash('message', 'Data Berhasil Diubah');
                return redirect()->route('editadmin');
            }
            } else {
                Session::flash('failed', 'Password Lama Salah');
                return redirect()->route('editadmin');
            }
        } else {
             if ($request->hasfile('gambar')) {
                $gambar = DB::table('users')->where('username', $sesi)->first();
                File::delete('gambaradmin/' . $gambar->gambar);
                $filename = round(microtime(true) * 1000) . '-' . str_replace(' ', '-', $request->file('gambar')->getClientOriginalName());
                $request->file('gambar')->move(public_path('gambaradmin'), $filename);
                \App\Models\User::where('username', $sesi)->update(
                    [
                        'nama' => $request->nama,
                        'username' => $request->username,
                        'gambar' => $filename
                    ]
            );

            Session::flash('message', 'Data Berhasil Ditambah');
            return redirect()->route('editadmin');
            } else {
                \App\Models\User::where('username', $sesi)->update([
                        'nama' => $request->nama,
                        'username' => $request->username,
                ]);
                Session::flash('message', 'Data Berhasil Diubah');
                return redirect()->route('editadmin');
            }

        }


    }


    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('login');
    }
}
