<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JenisSuratSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['nama' => 'Surat Cuti', 'kode' => 'SC'],
            ['nama' => 'Surat Izin', 'kode' => 'SI'],
            ['nama' => 'Surat Tugas', 'kode' => 'ST'],
        ];

        DB::table('jenis_surat')->insert($data);
    }
}
