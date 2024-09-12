<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Carbon; // Untuk tanggal

class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            // Kategori 1
            ['kategori_id' => 1, 'barang_kode' => 'B001', 'barang_nama' => 'Televisi', 'harga_beli' => 2500000, 'harga_jual' => 3000000],
            ['kategori_id' => 1, 'barang_kode' => 'B002', 'barang_nama' => 'Radio', 'harga_beli' => 500000, 'harga_jual' => 700000],
            ['kategori_id' => 1, 'barang_kode' => 'B003', 'barang_nama' => 'Kulkas', 'harga_beli' => 2000000, 'harga_jual' => 2500000],
            ['kategori_id' => 1, 'barang_kode' => 'B004', 'barang_nama' => 'Mesin Cuci', 'harga_beli' => 1500000, 'harga_jual' => 2000000],
            ['kategori_id' => 1, 'barang_kode' => 'B005', 'barang_nama' => 'Kipas Angin', 'harga_beli' => 300000, 'harga_jual' => 500000],

            // Kategori 2
            ['kategori_id' => 2, 'barang_kode' => 'B006', 'barang_nama' => 'Kaos Polos', 'harga_beli' => 70000, 'harga_jual' => 100000],
            ['kategori_id' => 2, 'barang_kode' => 'B007', 'barang_nama' => 'Celana Jeans', 'harga_beli' => 150000, 'harga_jual' => 200000],
            ['kategori_id' => 2, 'barang_kode' => 'B008', 'barang_nama' => 'Jaket', 'harga_beli' => 250000, 'harga_jual' => 300000],
            ['kategori_id' => 2, 'barang_kode' => 'B009', 'barang_nama' => 'Sepatu', 'harga_beli' => 350000, 'harga_jual' => 450000],
            ['kategori_id' => 2, 'barang_kode' => 'B010', 'barang_nama' => 'Topi', 'harga_beli' => 50000, 'harga_jual' => 80000],

            // Kategori 3
            ['kategori_id' => 3, 'barang_kode' => 'B011', 'barang_nama' => 'Beras', 'harga_beli' => 100000, 'harga_jual' => 120000],
            ['kategori_id' => 3, 'barang_kode' => 'B012', 'barang_nama' => 'Gula', 'harga_beli' => 15000, 'harga_jual' => 20000],
            ['kategori_id' => 3, 'barang_kode' => 'B013', 'barang_nama' => 'Minyak Goreng', 'harga_beli' => 20000, 'harga_jual' => 25000],
            ['kategori_id' => 3, 'barang_kode' => 'B014', 'barang_nama' => 'Susu', 'harga_beli' => 12000, 'harga_jual' => 15000],
            ['kategori_id' => 3, 'barang_kode' => 'B015', 'barang_nama' => 'Kopi', 'harga_beli' => 30000, 'harga_jual' => 35000],
        ];

        // Menambahkan data ke dalam tabel m_barang
        foreach ($data as &$item) {
            $item['created_at'] = Carbon::now();
            $item['updated_at'] = Carbon::now();
        }

        DB::table('m_barang')->insert($data);
    }
}
