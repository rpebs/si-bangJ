<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriSurat extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function suratmasuk(){
        return $this->hasOne(SuratMasuk::class);
    }

    public function suratkeluar(){
        return $this->hasOne(SuratKeluar::class);
    }
}
