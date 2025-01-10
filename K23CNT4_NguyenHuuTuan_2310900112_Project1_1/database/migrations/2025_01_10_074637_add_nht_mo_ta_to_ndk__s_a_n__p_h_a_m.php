<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('nht_SAN_PHAM', function (Blueprint $table) {
            $table->text('nhtMoTa');  // Thêm cột 'nhtMoTa'
        });
    }

    public function down(): void
    {
        Schema::table('nht_SAN_PHAM', function (Blueprint $table) {
            $table->dropColumn('nhtMoTa');
        });
    }
};