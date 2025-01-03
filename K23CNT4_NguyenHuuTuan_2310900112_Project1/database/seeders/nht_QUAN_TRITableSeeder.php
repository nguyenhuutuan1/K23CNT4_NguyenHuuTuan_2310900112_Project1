<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash; // Thêm dòng này

class nht_QUAN_TRITableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Mã hóa mật khẩu bằng Hash::make()
        $nhtMatKhau = Hash::make('huutuan12082005'); // Mã hóa mật khẩu

        DB::table('nht_QUAN_TRI')->insert([
            'nhtTaiKhoan' => 'huutuan@gmail.com',
            'nhtMatKhau' => $nhtMatKhau,
            'nhtTrangThai' => 0
        ]);

        DB::table('nht_QUAN_TRI')->insert([
            'nhtTaiKhoan' => '0328942958',
            'nhtMatKhau' => $nhtMatKhau,
            'nhtTrangThai' => 0
        ]);
    }
}