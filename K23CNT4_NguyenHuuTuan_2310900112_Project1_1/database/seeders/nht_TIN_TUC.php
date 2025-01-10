<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
class nht_TIN_TUC extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 0; $i < 10; $i++) {
            DB::table('nht_TIN_TUC')->insert([
                'nhtMaTT' => $faker->unique()->word, 
                'nhtTieuDe' => $faker->sentence, 
                'nhtMoTa' => $faker->text(200), 
                'nhtNoiDung' => $faker->paragraph(5), 
                'nhtNgayDangTin' => $faker->dateTimeThisYear(), 
                'nhtNgayCapNhap' => $faker->dateTimeThisYear(), 
                'nhtHinhAnh' => $faker->imageUrl(), 
                'nhtTrangThai' => $faker->numberBetween(0, 1), 
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}