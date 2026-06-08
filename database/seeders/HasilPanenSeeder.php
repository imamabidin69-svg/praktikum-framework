<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; // <-- Posisi yang benar adalah di sini (di luar class)

class HasilPanenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('hasil_panens')->insert([
            [
                'nama_komoditas' => 'Padi',
                'jumlah_kg' => 500,
                'tanggal_panen' => '2026-05-10'
            ],
            [
                'nama_komoditas' => 'Jagung',
                'jumlah_kg' => 300,
                'tanggal_panen' => '2026-05-12'
            ]
        ]);
    }
}