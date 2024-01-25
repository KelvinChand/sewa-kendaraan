<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class kendaraanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('table_master_kendaraan')->insert([
            'id_kendaraan' => 1,
            'plat_kendaraan' => "BG 1750 HH",
            'nama_kendaraan' => "Innova"
        ]);
    }
}
