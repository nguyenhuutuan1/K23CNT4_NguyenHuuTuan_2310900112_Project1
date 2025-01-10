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
        Schema::create('nht_HOA_DON', function (Blueprint $table) {
            $table->id();
            $table->string('nhtMaHoaDon', 255)->unique();
            
            $table->bigInteger('nhtMaKhachHang')->unsigned();
            $table->foreign('nhtMaKhachHang')
                  ->references('id')->on('nht_KHACH_HANG')
                  ->onDelete('cascade');  
            
            $table->date('nhtNgayHoaDon');
            $table->date('nhtNgayNhan');
            $table->string('nhtHoTenKhachHang', 255);
            $table->string('nhtEmail', 255);
            $table->string('nhtDienThoai', 255);
            $table->string('nhtDiaChi', 255);
            $table->float('nhtTongGiaTri');
            $table->tinyInteger('nhtTrangThai');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nht_HOA_DON');
    }
};