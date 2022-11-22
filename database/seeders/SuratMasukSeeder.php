<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SuratMasukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         \App\Models\SuratMasuk::insert([
            'kode_surat' => 'SRT001',
            'kategori_id' => '2',
            'tgl_masuk' => '2022-11-22',
            'pengirim' => 'Dispora',
            'perihal' => 'Rapat Mingguan',
            'tempat' => 'Kantor Dispora',
            'tgl_mulai' => '2022-11-25',
            'tgl_selesai' => '2022-11-25',
            'keterangan' => 'Wajib Hadir',
            'file' => 'srt.pdf',
         ]);
    }
}
