<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class nht_CT_HOA_DONTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('nht_CT_HOA_DON')->insert([
            'nhtHoaDonID'=>1,
            'nhtSanPhamID'=>1,
            'nhtSoLuongMua'=>12,
            'nhtDonGiaMua'=>40000,
            'nhtThanhtien'=>40000 * 12,
            'nhtTrangThai'=>0,
        ]);

        DB::table('nht_CT_HOA_DON')->insert([
            'nhtHoaDonID'=>2,
            'nhtSanPhamID'=>2,
            'nhtSoLuongMua'=>20,
            'nhtDonGiaMua'=>55000,
            'nhtThanhtien'=>55000 * 20,
            'nhtTrangThai'=>0,
        ]);

        DB::table('nht_CT_HOA_DON')->insert([
            'nhtHoaDonID'=>3,
            'nhtSanPhamID'=>5,
            'nhtSoLuongMua'=>5,
            'nhtDonGiaMua'=>59000,
            'nhtThanhtien'=>59000 *  5,
            'nhtTrangThai'=>0,
        ]);

        DB::table('NHT_CT_HOA_DON')->insert([
            'nhtHoaDonID'=>4,
            'nhtSanPhamID'=>8,
            'nhtSoLuongMua'=>3,
            'nhtDonGiaMua'=>1000,
            'nhtThanhTien'=>1000 * 3,
            'nhtTrangThai'=>0,
        ]);
    }
}