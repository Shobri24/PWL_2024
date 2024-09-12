<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon; // Untuk mendapatkan waktu saat ini

class SupplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'supplier_kode' => 'S001',
                'supplier_nama' => 'Supplier A',
                'supplier_alamat' => 'Alamat Supplier A',
                'created_at' => Carbon::now(), // Menetapkan waktu saat ini
                'updated_at' => Carbon::now(), // Menetapkan waktu saat ini
            ],
            [
                'supplier_kode' => 'S002',
                'supplier_nama' => 'Supplier B',
                'supplier_alamat' => 'Alamat Supplier B',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'supplier_kode' => 'S003',
                'supplier_nama' => 'Supplier C',
                'supplier_alamat' => 'Alamat Supplier C',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ];

        DB::table('m_supplier')->insert($data);
    }
}
