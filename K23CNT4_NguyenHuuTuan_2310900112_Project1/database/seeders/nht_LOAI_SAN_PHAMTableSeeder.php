<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class nht_LOAI_SAN_PHAMTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('nht_LOAI_SAN_PHAM')->insert([
            'nhtMaLoai'=>'S01',
            'nhtTenLoai'=>'Bim Lays',
            'nhtTrangThai'=>0
        ]);
        DB::table('nht_LOAI_SAN_PHAM')->insert([
            'nhtMaLoai'=>'D02',
            'nhtTenLoai'=>'Nước CoCaCoLa',
            'nhtTrangThai'=>0
        ]);
        DB::table('nht_LOAI_SAN_PHAM')->insert([
            'nhtMaLoai'=>'F03',
            'nhtTenLoai'=>'Mì Hảo Hảo',
            'nhtTrangThai'=>0
        ]);
    }
}