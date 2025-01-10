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
            'nhtMaLoai'=>'A001',
            'nhtTenLoai'=>'BIM BIM',
            'nhtTrangThai'=>0
        ]);
        DB::table('nht_LOAI_SAN_PHAM')->insert([
            'nhtMaLoai'=>'B002',
            'nhtTenLoai'=>'Nước ngọt',
            'nhtTrangThai'=>0
        ]);
        DB::table('nht_LOAI_SAN_PHAM')->insert([
            'nhtMaLoai'=>'C003',
            'nhtTenLoai'=>' MỲ',
            'nhtTrangThai'=>0
        ]);
        DB::table('nht_LOAI_SAN_PHAM')->insert([
            'nhtMaLoai'=>'D004',
            'nhtTenLoai'=>'BÚT',
            'nhtTrangThai'=>0 
        ]);
    }
}