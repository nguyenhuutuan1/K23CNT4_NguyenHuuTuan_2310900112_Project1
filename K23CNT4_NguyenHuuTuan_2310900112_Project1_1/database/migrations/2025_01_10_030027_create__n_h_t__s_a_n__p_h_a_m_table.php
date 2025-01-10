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
        Schema::create('nht_SAN_PHAM', function (Blueprint $table) {
            $table->id();
            $table->string('nhtMaSanPham', 255)->unique();
            $table->string('nhtTenSanPham', 255)->index(); // Thêm chỉ mục
            $table->string('nhtHinhAnh', 500);
            $table->integer('nhtSoLuong');
            $table->decimal('nhtDonGia', 10, 2); // Sử dụng decimal cho độ chính xác cao
            $table->bigInteger('nhtMaLoai')->unsigned();
            $table->foreign('nhtMaLoai')->references('id')->on('nht_LOAI_SAN_PHAM')->onDelete('cascade');
            $table->tinyInteger('nhtTrangThai');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('nht_SAN_PHAM', function (Blueprint $table) {
            $table->dropForeign(['nhtMaLoai']);
        });

        Schema::dropIfExists('nht_SAN_PHAM');
    }
};