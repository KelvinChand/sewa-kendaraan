<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::table('table_master_transaksi', function (Blueprint $table) {
            $table->integer('id_kendaraan')->unsigned();
            $table->foreign('id_kendaraan')->references('id_kendaraan')->on('table_master_kendaraan');
        });
    }

    public function down(): void
    {
        Schema::dropColumns('table_master_transaksi','id_kendaraan');
    }
};
