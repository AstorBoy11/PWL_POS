<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class PenjualanSeeder extends Seeder
{
    public function run()
    {
        for ($i = 1; $i <= 10; $i++) {
            DB::table('t_penjualan')->insert([
                'user_id' => 1,
                'pembeli' => 'Pembeli ' . $i,
                'penjualan_kode' => 'TRX' . str_pad($i, 3, '0', STR_PAD_LEFT),
                'penjualan_tanggal' => Carbon::now(),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}
