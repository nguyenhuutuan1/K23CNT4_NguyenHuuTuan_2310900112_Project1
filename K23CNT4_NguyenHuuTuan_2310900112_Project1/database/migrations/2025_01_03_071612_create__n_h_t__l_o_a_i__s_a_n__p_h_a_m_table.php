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
        Schema::create('nht_LOAI_SAN_PHAM', function (Blueprint $table) {
            $table->id();
            $table->string('nhtMaLoai',255)->unique();
            $table->string('nhtTenLoai',255);
            $table->tinyInteger('nhtTrangThai');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nht_LOAI_SAN_PHAM');
    }
};