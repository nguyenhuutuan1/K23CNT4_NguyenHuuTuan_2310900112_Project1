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
        Schema::create('nht_CT_HOA_DON', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('nhtHoaDonID')->references('id')->on('nht_HOA_DON');
            $table->bigInteger('nhtSanPhamID')->references('id')->on('nht_SAN_PHAM');
            $table->integer('nhtSoLuongMua');
            $table->float('nhtDonGiaMua');
            $table->double('nhtThanhtien');
            $table->tinyInteger('nhtTrangThai');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nht_CT_HOA_DON');
    }
};