<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('table_master_kendaraan', function (Blueprint $table) {
            $table->increments('id_kendaraan')->unsigned();
            $table->string('plat_kendaraan', 10 )->unique();
            $table->string('nama_kendaraan', 255 );
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('table_master_kendaraan');
    }
};
