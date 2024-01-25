<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('table_master_transaksi', function (Blueprint $table) {
            $table->increments('id_transaksi')->unsigned();
            $table->string('nama_customer');
            $table->date('tanggal_mulai_sewa');
            $table->date('tanggal_selesai_sewa');
            $table->double('harga_sewa');
            $table->date('tanggal_buat_order');
            $table->date('tanggal_update_order');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('table_master_transaksi');
    }
};
