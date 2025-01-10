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
        Schema::create('nht_TIN_TUC', function (Blueprint $table) {
            $table->id();
            $table->string('nhtMaTT')->unique(); 
            $table->string('nhtTieuDe');
            $table->text('nhtMoTa'); 
            $table->longText('nhtNoiDung'); 
            $table->dateTime('nhtNgayDangTin'); 
            $table->dateTime('nhtNgayCapNhap'); 
            $table->string('nhtHinhAnh');
            $table->tinyInteger('nhtTrangThai'); 

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nht_TIN_TUC');
    }
};