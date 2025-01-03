<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class nht_SAN_PHAMTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        DB::table('nht_SAN_PHAM')->insert([
            'nhtMaSanPham' => 'S01',
            'nhtTenSanPham' => 'Bim Lays',
            'nhtHinhAnh' => asset(''),
            'nhtSoLuong' => 100,
            'nhtDonGia' => 10000,
            'nhtMaLoai' => 2,
            'nhtMoTa' => '',
            'nhtTrangThai' => 0
        ]);
        
       
        
        DB::table('nht_SAN_PHAM')->insert([
            'nhtMaSanPham' => 'D02',
            'nhtTenSanPham' => 'Nước CoCaCoLa',
            'nhtHinhAnh' => asset(''),
            'nhtSoLuong' => 100,
            'nhtDonGia' => 9000,
            'nhtMaLoai' => 1,
            'nhtMoTa' => '',
            'nhtTrangThai' => 0
        ]);
        
        DB::table('nht_SAN_PHAM')->insert([
            'nhtMaSanPham' => 'F03',
            'nhtTenSanPham' => 'Mì Hảo Hảo',
            'nhtHinhAnh' => asset(''),
            'nhtSoLuong' => 150,
            'nhtDonGia' => 4000,
            'nhtMaLoai' => 3,
            'nhtMoTa' => '',
            'nhtTrangThai' => 0
        ]);
    }
}