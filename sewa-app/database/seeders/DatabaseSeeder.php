<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\kendaraan;
use App\Models\transaksi;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $kendaraan = [
            [
                "id_kendaraan"=> "1",
                "plat_kendaraan"=> "BG 1750 HH",
                "nama_kendaraan"=> "Innova",
            ],
            [
                "id_kendaraan"=> "2",
                "plat_kendaraan"=> "BG 1245 OH",
                "nama_kendaraan"=> "Brio",
            ],
            [
                "id_kendaraan"=> "3",
                "plat_kendaraan"=> "BG 8192 BB",
                "nama_kendaraan"=> "Calya",
            ],
            [
                "id_kendaraan"=> "4",
                "plat_kendaraan"=> "BG 1895 GH",
                "nama_kendaraan"=> "Rush",
            ],
            [
                "id_kendaraan"=> "5",
                "plat_kendaraan"=> "BG 3216 CE",
                "nama_kendaraan"=> "X Pander",
            ],
        ];

        if(DB::table('table_master_kendaraan')->count()== 0)
        {
            kendaraan::insert($kendaraan);
        }

        $transaksi = [
            [
                "nama_customer" => "Adi",
                "id_kendaraan"=> "2",
                "tanggal_mulai_sewa"=> "2023-12-01",
                "tanggal_selesai_sewa"=> "2024-03-01",
                "harga_sewa"=> "300000",
                "tanggal_buat_order"=> "2023-12-01",
                "tanggal_update_order"=> "2023-12-20",
            ],
            [
                "nama_customer" => "Caca",
                "id_kendaraan"=> "3",
                "tanggal_mulai_sewa"=> "2023-11-20",
                "tanggal_selesai_sewa"=> "2024-05-20",
                "harga_sewa"=> "500000",
                "tanggal_buat_order"=> "2023-11-20",
                "tanggal_update_order"=> "2024-01-25",
            ],
        ];

        if(DB::table('table_master_transaksi')->count()== 0)
        {
            transaksi::insert($transaksi);
        }
    }
}
