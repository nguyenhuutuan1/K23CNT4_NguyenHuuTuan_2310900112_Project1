<?php

namespace Database\Seeders;

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
        DB::table('nht_KHACH_HANG')->insert([
            'nhtMaKhachHang' => 'HT005', 
            'nhtHoTenKhachHang' => 'Nguyễn Hữu Tuấn',
            'nhtEmail' => 'nguyenhuutuan@gmail.com',
            'nhtMatKhau' => Hash::make('123456a@'), 
            'nhtDienThoai' => '0328942958',
            'nhtDiaChi' => 'Hà Nội',
            'nhtNgayDangKy' => '2024-08-12',
            'nhtTrangThai' => 0,
        ]);        

        DB::table('nht_KHACH_HANG')->insert([
            'nhtMaKhachHang' => 'VQ002',
            'nhtHoTenKhachHang' => 'Nguyễn Văn Quân',
            'nhtEmail' => 'vanquan@gmail.com',
            'nhtMatKhau' => Hash::make('123456a@'),
            'nhtDienThoai' => '093625738',
            'nhtDiaChi' => 'Daklak',
            'nhtNgayDangKy' => '2024-10-23', 
            'nhtTrangThai' => 0,
        ]);

        DB::table('nht_KHACH_HANG')->insert([
            'nhtMaKhachHang' => 'TD003',
            'nhtHoTenKhachHang' => 'Nguyễn Tuấn Đạt',
            'nhtEmail' => 'tuandat@gmail.com',
            'nhtMatKhau' => Hash::make('123456a@'), 
            'nhtDienThoai' => '03254593761',
            'nhtDiaChi' => 'Vũng Tàu',
            'nhtNgayDangKy' => '2024-10-12', 
            'nhtTrangThai' => 0, 
        ]);
        

        DB::table('nht_KHACH_HANG')->insert([
            'nhtMaKhachHang' => 'VM004',
            'nhtHoTenKhachHang' => 'Nguyễn Văn Minh',
            'nhtEmail' => 'vanminh@gmail.com',
            'nhtMatKhau' => Hash::make('123456a@'), 
            'nhtDienThoai' => '03856747284',
            'nhtDiaChi' => 'Cửa Lò',
            'nhtNgayDangKy' => '2024-02-25', 
            'nhtTrangThai' => 0,
        ]);
        
    }
}