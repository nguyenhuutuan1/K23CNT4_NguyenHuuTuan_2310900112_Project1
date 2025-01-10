<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash; 

class nht_QUAN_TRITableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $nhtMatKhau = Hash::make('123456789a@'); 

    if (!DB::table('nht_QUAN_TRI')->where('nhtTaiKhoan', 'nguyenhuutuan205@gmail.com')->exists()) {
        DB::table('nht_QUAN_TRI')->insert([
            'nhtTaiKhoan' => 'nguyenhuutuan205@gmail.com',
            'nhtMatKhau' => $nhtMatKhau,
            'nhtTrangThai' => 0
        ]);
}

        DB::table('nht_QUAN_TRI')->insert([
            'nhtTaiKhoan' => '0328942958',
            'nhtMatKhau' => $nhtMatKhau,
            'nhtTrangThai' => 0
        ]);

        DB::table('nht_QUAN_TRI')->insert([
            'nhtTaiKhoan' => 'newbie@example.com',  
            'nhtMatKhau' => $nhtMatKhau,
            'nhtTrangThai' => 0
        ]);
        
    }
}