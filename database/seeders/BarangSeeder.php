<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BarangSeeder extends Seeder
{
    public function run()
    {
        $data = [
            ['kategori_id' => 1, 'barang_kode' => 'BRG001', 'barang_nama' => 'Laptop', 'harga_beli' => 5000000, 'harga_jual' => 5500000],
            ['kategori_id' => 1, 'barang_kode' => 'BRG002', 'barang_nama' => 'Smartphone', 'harga_beli' => 3000000, 'harga_jual' => 3500000],
            ['kategori_id' => 2, 'barang_kode' => 'BRG003', 'barang_nama' => 'Kaos Polos', 'harga_beli' => 50000, 'harga_jual' => 70000],
            ['kategori_id' => 2, 'barang_kode' => 'BRG004', 'barang_nama' => 'Jaket Hoodie', 'harga_beli' => 150000, 'harga_jual' => 200000],
            ['kategori_id' => 3, 'barang_kode' => 'BRG005', 'barang_nama' => 'Roti Manis', 'harga_beli' => 5000, 'harga_jual' => 8000],
            ['kategori_id' => 3, 'barang_kode' => 'BRG006', 'barang_nama' => 'Biskuit', 'harga_beli' => 7000, 'harga_jual' => 10000],
            ['kategori_id' => 4, 'barang_kode' => 'BRG007', 'barang_nama' => 'Kopi Botol', 'harga_beli' => 10000, 'harga_jual' => 15000],
            ['kategori_id' => 4, 'barang_kode' => 'BRG008', 'barang_nama' => 'Teh Botol', 'harga_beli' => 8000, 'harga_jual' => 12000],
            ['kategori_id' => 5, 'barang_kode' => 'BRG009', 'barang_nama' => 'Lipstik', 'harga_beli' => 20000, 'harga_jual' => 30000],
            ['kategori_id' => 5, 'barang_kode' => 'BRG010', 'barang_nama' => 'Bedak', 'harga_beli' => 25000, 'harga_jual' => 40000],
        ];

        DB::table('m_barang')->insert($data);
    }
}
