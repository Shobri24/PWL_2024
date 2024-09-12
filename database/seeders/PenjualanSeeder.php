<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class PenjualanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['penjualan_id' => 1, 'user_id' => 1, 'pembeli' => 'Pembeli A', 'penjualan_kode' => 'PJL001', 'penjualan_tanggal' => Carbon::now()->subDays(10), 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['penjualan_id' => 2, 'user_id' => 2, 'pembeli' => 'Pembeli B', 'penjualan_kode' => 'PJL002', 'penjualan_tanggal' => Carbon::now()->subDays(9), 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['penjualan_id' => 3, 'user_id' => 3, 'pembeli' => 'Pembeli C', 'penjualan_kode' => 'PJL003', 'penjualan_tanggal' => Carbon::now()->subDays(8), 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['penjualan_id' => 4, 'user_id' => 1, 'pembeli' => 'Pembeli D', 'penjualan_kode' => 'PJL004', 'penjualan_tanggal' => Carbon::now()->subDays(7), 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['penjualan_id' => 5, 'user_id' => 2, 'pembeli' => 'Pembeli E', 'penjualan_kode' => 'PJL005', 'penjualan_tanggal' => Carbon::now()->subDays(6), 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['penjualan_id' => 6, 'user_id' => 3, 'pembeli' => 'Pembeli F', 'penjualan_kode' => 'PJL006', 'penjualan_tanggal' => Carbon::now()->subDays(5), 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['penjualan_id' => 7, 'user_id' => 1, 'pembeli' => 'Pembeli G', 'penjualan_kode' => 'PJL007', 'penjualan_tanggal' => Carbon::now()->subDays(4), 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['penjualan_id' => 8, 'user_id' => 2, 'pembeli' => 'Pembeli H', 'penjualan_kode' => 'PJL008', 'penjualan_tanggal' => Carbon::now()->subDays(3), 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['penjualan_id' => 9, 'user_id' => 3, 'pembeli' => 'Pembeli I', 'penjualan_kode' => 'PJL009', 'penjualan_tanggal' => Carbon::now()->subDays(2), 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['penjualan_id' => 10, 'user_id' => 1, 'pembeli' => 'Pembeli J', 'penjualan_kode' => 'PJL010', 'penjualan_tanggal' => Carbon::now()->subDays(1), 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        ];

        DB::table('t_penjualan')->insert($data);
    }
}
