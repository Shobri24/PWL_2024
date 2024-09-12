<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class PenjualanDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['detail_id' => 1, 'barang_id' => 1, 'penjualan_id' => 1, 'harga' => 100000, 'jumlah' => 2, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['detail_id' => 2, 'barang_id' => 2, 'penjualan_id' => 1, 'harga' => 150000, 'jumlah' => 1, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['detail_id' => 3, 'barang_id' => 3, 'penjualan_id' => 2, 'harga' => 200000, 'jumlah' => 3, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['detail_id' => 4, 'barang_id' => 4, 'penjualan_id' => 2, 'harga' => 250000, 'jumlah' => 1, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['detail_id' => 5, 'barang_id' => 5, 'penjualan_id' => 3, 'harga' => 180000, 'jumlah' => 2, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['detail_id' => 6, 'barang_id' => 6, 'penjualan_id' => 3, 'harga' => 220000, 'jumlah' => 1, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['detail_id' => 7, 'barang_id' => 7, 'penjualan_id' => 4, 'harga' => 120000, 'jumlah' => 5, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['detail_id' => 8, 'barang_id' => 8, 'penjualan_id' => 4, 'harga' => 140000, 'jumlah' => 2, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['detail_id' => 9, 'barang_id' => 9, 'penjualan_id' => 5, 'harga' => 160000, 'jumlah' => 3, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['detail_id' => 10, 'barang_id' => 10, 'penjualan_id' => 5, 'harga' => 170000, 'jumlah' => 1, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['detail_id' => 11, 'barang_id' => 11, 'penjualan_id' => 6, 'harga' => 100000, 'jumlah' => 2, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['detail_id' => 12, 'barang_id' => 12, 'penjualan_id' => 6, 'harga' => 120000, 'jumlah' => 3, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['detail_id' => 13, 'barang_id' => 13, 'penjualan_id' => 7, 'harga' => 130000, 'jumlah' => 1, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['detail_id' => 14, 'barang_id' => 14, 'penjualan_id' => 7, 'harga' => 150000, 'jumlah' => 2, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['detail_id' => 15, 'barang_id' => 15, 'penjualan_id' => 8, 'harga' => 200000, 'jumlah' => 1, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['detail_id' => 16, 'barang_id' => 1, 'penjualan_id' => 8, 'harga' => 110000, 'jumlah' => 3, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['detail_id' => 17, 'barang_id' => 2, 'penjualan_id' => 9, 'harga' => 180000, 'jumlah' => 2, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['detail_id' => 18, 'barang_id' => 3, 'penjualan_id' => 9, 'harga' => 220000, 'jumlah' => 1, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['detail_id' => 19, 'barang_id' => 4, 'penjualan_id' => 10, 'harga' => 230000, 'jumlah' => 2, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['detail_id' => 20, 'barang_id' => 5, 'penjualan_id' => 10, 'harga' => 250000, 'jumlah' => 1, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['detail_id' => 21, 'barang_id' => 6, 'penjualan_id' => 1, 'harga' => 130000, 'jumlah' => 3, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['detail_id' => 22, 'barang_id' => 7, 'penjualan_id' => 2, 'harga' => 120000, 'jumlah' => 4, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['detail_id' => 23, 'barang_id' => 8, 'penjualan_id' => 3, 'harga' => 110000, 'jumlah' => 2, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['detail_id' => 24, 'barang_id' => 9, 'penjualan_id' => 4, 'harga' => 125000, 'jumlah' => 1, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['detail_id' => 25, 'barang_id' => 10, 'penjualan_id' => 5, 'harga' => 135000, 'jumlah' => 2, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['detail_id' => 26, 'barang_id' => 11, 'penjualan_id' => 6, 'harga' => 140000, 'jumlah' => 1, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['detail_id' => 27, 'barang_id' => 12, 'penjualan_id' => 7, 'harga' => 150000, 'jumlah' => 3, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['detail_id' => 28, 'barang_id' => 13, 'penjualan_id' => 8, 'harga' => 160000, 'jumlah' => 2, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['detail_id' => 29, 'barang_id' => 14, 'penjualan_id' => 9, 'harga' => 170000, 'jumlah' => 1, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['detail_id' => 30, 'barang_id' => 15, 'penjualan_id' => 10, 'harga' => 180000, 'jumlah' => 1, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        ];

        DB::table('t_penjualan_detail')->insert($data);
    }
}
