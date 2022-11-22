<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriBarang extends Model
{
    use HasFactory;
    protected $table = 'kategori_barangs';
    protected $guarded = ['id'];

     public function barang(){
        return $this->hasOne(Barang::class);
    }
}
