<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuratKeluar extends Model
{
    use HasFactory;
    protected $table = 'surat_keluars';
    protected $guarded = ['id'];

    public function kategori(){
        return $this->belongsTo('\App\Models\KategoriSurat');
    }
}
