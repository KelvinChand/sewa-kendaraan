<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\kendaraan;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

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
    }
}
