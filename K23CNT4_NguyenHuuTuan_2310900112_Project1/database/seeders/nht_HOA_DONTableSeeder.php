<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class nht_HOA_DONTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('nht_HOA_DON')->insert([
            'nhtMaHoaDon'=>'nht2005',
            'nhtMaKhachHang'=>1,
            'nhtHoTenKhachHang'=>'Nguyễn Hữu Tuấn',
            'nhtEmail'=>'huutuan@gmail.com',
            'nhtDienThoai'=>'0328942958',
            'nhtDiaChi'=>'Nghệ An',
            'nhtTongGiaTri'=>'20000',
            'nhtTrangThai'=>2,
        ]);

        DB::table('nht_HOA_DON')->insert([
            'nhtMaHoaDon'=>'ABC001',
            'nhtMaKhachHang'=>2,
            'nhtHoTenKhachHang'=>'Nguyễn Văn Quân',
            'nhtEmail'=>'vanquan@gmail.com',
            'nhtDienThoai'=>'0111223444',
            'nhtDiaChi'=>'Nội Bài',
            'nhtTongGiaTri'=>'31000',
            'nhtTrangThai'=>0,
        ]);

        DB::table('nht_HOA_DON')->insert([
            'nhtMaHoaDon'=>'ABC003',
            'nhtMaKhachHang'=>3,
            'nhtHoTenKhachHang'=>'Phan Quang Minh',
            'nhtEmail'=>'vanminh@gmail.com',
            'nhtDienThoai'=>'023627634',
            'nhtDiaChi'=>'Lạng Sơn',
            'nhtTongGiaTri'=>'25000',
            'nhtTrangThai'=>1,
        ]);

        DB::table('nht_HOA_DON')->insert([
            'nhtMaHoaDon'=>'ACB003',
            'nhtMaKhachHang'=>4,
            'nhtHoTenKhachHang'=>'Nguyễn Văn Chung',
            'nhtEmail'=>'vanchung@gmail.com',
            'nhtDienThoai'=>'036378421',
            'nhtDiaChi'=>'Hà Nội',
            'nhtTongGiaTri'=>'23000',
            'nhtTrangThai'=>1,
        ]);
    }
}