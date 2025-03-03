<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KategoriSeeder extends Seeder
{
    public function run()
    {
        $data = [
            ['kategori_kode' => 'ELK', 'kategori_nama' => 'Elektronik'],
            ['kategori_kode' => 'FAS', 'kategori_nama' => 'Fashion'],
            ['kategori_kode' => 'MKN', 'kategori_nama' => 'Makanan'],
            ['kategori_kode' => 'MNM', 'kategori_nama' => 'Minuman'],
            ['kategori_kode' => 'KSM', 'kategori_nama' => 'Kosmetik'],
        ];

        DB::table('m_kategori')->insert($data);
    }
}
