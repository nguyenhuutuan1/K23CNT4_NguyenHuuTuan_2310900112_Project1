<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash; 

class nht_KHACH_HANGTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('nht_KHACH_HANG')->insert([
            'nhtMaKhachHang'=>'nht205',
            'nhtHoTenKhachHang'=>'Nguyễn Hữu Tuấn',
            'nhtEmail'=>'huutuan@gmail.com',
            'nhtMatKhau'=>Hash::make('123456a@'), 
            'nhtDienThoai'=>'0328942958',
            'nhtDiaChi'=>'Nghệ An',
            'nhtTrangThai'=>0,
        ]);

        DB::table('nht_KHACH_HANG')->insert([
            'nhtMaKhachHang'=>'ABC001',
            'nhtHoTenKhachHang'=>'Nguyễn Văn Quân',
            'nhtEmail'=>'vanquan@gmail.com',
            'nhtMatKhau'=>Hash::make('vanquan123'), 
            'nhtDienThoai'=>'0111223444',
            'nhtDiaChi'=>'NỘI BÀI',
            'nhtTrangThai'=>0,
        ]);

        DB::table('nht_KHACH_HANG')->insert([
            'nhtMaKhachHang'=>'ABC002',
            'nhtHoTenKhachHang'=>'Nguyễn Văn Minh',
            'nhtEmail'=>'vanminh@gmail.com',
            'nhtMatKhau'=>Hash::make('vanminh123'), 
            'nhtDienThoai'=>'023627634',
            'nhtDiaChi'=>'Lạng Sơn',
            'nhtTrangThai'=>2,
        ]);

        DB::table('nht_KHACH_HANG')->insert([
            'nhtMaKhachHang'=>'ABC003',
            'nhtHoTenKhachHang'=>'Nguyễn Văn Chung',
            'nhtEmail'=>'vanchung@gmail.com',
            'nhtMatKhau'=>Hash::make('vanchung1213'), 
            'nhtDienThoai'=>'036378421',
            'nhtDiaChi'=>'Hà Nội',
            'nhtTrangThai'=>0,
        ]);
    }
}