<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class PenjualanDetailSeeder extends Seeder
{
    public function run()
    {
        for ($i = 1; $i <= 10; $i++) { // 10 transaksi
            for ($j = 1; $j <= 3; $j++) { // 3 barang per transaksi
                DB::table('t_penjualan_detail')->insert([
                    'penjualan_id' => $i,
                    'barang_id' => rand(1, 10),
                    'harga' => rand(5000, 50000),
                    'jumlah' => rand(1, 5),
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]);
            }
        }
    }
}
