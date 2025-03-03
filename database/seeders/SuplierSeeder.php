<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class SuplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $supliers = [
            ['nama_suplier' => 'PT Sumber Berkah', 'kontak' => '081234567890', 'alamat' => 'Jl. Raya No. 1, Jakarta'],
            ['nama_suplier' => 'CV Maju Jaya', 'kontak' => '081345678901', 'alamat' => 'Jl. Merdeka No. 2, Bandung'],
            ['nama_suplier' => 'Toko Makmur Sentosa', 'kontak' => '081456789012', 'alamat' => 'Jl. Sejahtera No. 3, Surabaya'],
            ['nama_suplier' => 'UD Sinar Abadi', 'kontak' => '081567890123', 'alamat' => 'Jl. Bunga No. 4, Medan'],
            ['nama_suplier' => 'PT Cahaya Sejati', 'kontak' => '081678901234', 'alamat' => 'Jl. Kenangan No. 5, Semarang'],
            ['nama_suplier' => 'CV Amanah Jaya', 'kontak' => '081789012345', 'alamat' => 'Jl. Harmoni No. 6, Yogyakarta'],
            ['nama_suplier' => 'Toko Sentosa', 'kontak' => '081890123456', 'alamat' => 'Jl. Pelangi No. 7, Malang'],
            ['nama_suplier' => 'UD Berkah Mulia', 'kontak' => '081901234567', 'alamat' => 'Jl. Mawar No. 8, Denpasar'],
            ['nama_suplier' => 'PT Sejahtera Abadi', 'kontak' => '081012345678', 'alamat' => 'Jl. Bahagia No. 9, Palembang'],
            ['nama_suplier' => 'CV Cahaya Baru', 'kontak' => '082123456789', 'alamat' => 'Jl. Melati No. 10, Makassar'],
            ['nama_suplier' => 'Toko Lancar Jaya', 'kontak' => '082234567890', 'alamat' => 'Jl. Anggrek No. 11, Balikpapan'],
            ['nama_suplier' => 'UD Makmur Bersama', 'kontak' => '082345678901', 'alamat' => 'Jl. Pahlawan No. 12, Pontianak'],
            ['nama_suplier' => 'PT Jaya Abadi', 'kontak' => '082456789012', 'alamat' => 'Jl. Merapi No. 13, Manado'],
            ['nama_suplier' => 'CV Sukses Mandiri', 'kontak' => '082567890123', 'alamat' => 'Jl. Cemara No. 14, Padang'],
            ['nama_suplier' => 'Toko Amanah', 'kontak' => '082678901234', 'alamat' => 'Jl. Teratai No. 15, Samarinda'],
            ['nama_suplier' => 'UD Bintang Terang', 'kontak' => '082789012345', 'alamat' => 'Jl. Melodi No. 16, Pekanbaru'],
            ['nama_suplier' => 'PT Harapan Mulia', 'kontak' => '082890123456', 'alamat' => 'Jl. Mawar No. 17, Medan'],
            ['nama_suplier' => 'CV Karya Indah', 'kontak' => '082901234567', 'alamat' => 'Jl. Sehat No. 18, Banda Aceh'],
            ['nama_suplier' => 'Toko Sinar Jaya', 'kontak' => '083012345678', 'alamat' => 'Jl. Damai No. 19, Banjarmasin'],
            ['nama_suplier' => 'UD Lancar Rejeki', 'kontak' => '083123456789', 'alamat' => 'Jl. Cemara No. 20, Jayapura'],
        ];

        DB::table('m_suplier')->insert($supliers);
    }
}
