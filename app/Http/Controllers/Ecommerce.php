<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Ecommerce extends Controller
{
    public function index(){
        $data = \App\Models\Barang::all();
        return view('user.ecommerce', ['title' => 'E-Commerce', 'barangs' => $data]);
    }
}
