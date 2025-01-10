<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class nht_HOA_DONTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('nht_HOA_DON')->insert([
            'nhtMaHoaDon' => 'HD01',
            'nhtMaKhachHang' => 'HT005', 
            'nhtNgayHoaDon' => '2024-11-15',
            'nhtNgayNhan' => '2024-11-20',
            'nhtHoTenKhachHang' => 'Nguyễn Hữu Tuấn',
            'nhtEmail' => 'huutuan@gmail.com',
            'nhtDienThoai' => '0328942958',
            'nhtDiaChi' => 'Hà Nội',
            'nhtTongGiaTri' => '990000',
            'nhtTrangThai' => 1,
        ]);
        
        DB::table('nht_HOA_DON')->insert([
            'nhtMaHoaDon' => 'HD02',
            'nhtMaKhachHang' => 'VQ002', 
            'nhtNgayHoaDon' => '2024-04-01',
            'nhtNgayNhan' => '2024-04-02',
            'nhtHoTenKhachHang' => 'Nguyễn Văn Quân',
            'nhtEmail' => 'vanquan@gmail.com',
            'nhtDienThoai' => '093625738',
            'nhtDiaChi' => 'Daklak',
            'nhtTongGiaTri' => '54000',
            'nhtTrangThai' => 0,
        ]);
        
        DB::table('nht_HOA_DON')->insert([
            'nhtMaHoaDon' => 'HD03',
            'nhtMaKhachHang' => 'TD003', 
            'nhtNgayHoaDon' => '2024-06-26',
            'nhtNgayNhan' => '2024-06-27',
            'nhtHoTenKhachHang' => 'Nguyễn Tuấn Đạt',
            'nhtEmail' => 'tuandat@gmail.com',
            'nhtDienThoai' => '03254593761',
            'nhtDiaChi' => 'Vũng Tàu',
            'nhtTongGiaTri' => '83000',
            'nhtTrangThai' => 1,
        ]);
        
        DB::table('nht_HOA_DON')->insert([
            'nhtMaHoaDon' => 'HD04',
            'nhtMaKhachHang' => 'VM004', 
            'nhtNgayHoaDon' => '2024-08-15',
            'nhtNgayNhan' => '2024-08-16',
            'nhtHoTenKhachHang' => 'Nguyễn Văn Minh',
            'nhtEmail' => 'vanminh@gmail.com',
            'nhtDienThoai' => '03856747284',
            'nhtDiaChi' => 'Cửa Lò',
            'nhtTongGiaTri' => '35000',
            'nhtTrangThai' => 1,
        ]);
    }
}