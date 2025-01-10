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
        $products = [
            [
                'nhtMaSanPham' => 'SS001',
                'nhtTenSanPham' => 'bim oishi',
                'nhtHinhAnh' => asset('img/san_pham/bim-oishi.webp'),
                'nhtSoLuong' => 23,
                'nhtDonGia' => 5000,
                'nhtMaLoai' => 1,
                'nhtMoTa' =>'ăn vui mồm',
                'nhtTrangThai' => 0,
            ],
            [
                'nhtMaSanPham' => 'IP001',
                'nhtTenSanPham' => 'COCACOLA',
                'nhtHinhAnh' => asset('img/san_pham/COCACOLA.webp'),
                'nhtSoLuong' => 50,
                'nhtDonGia' => 9000,
                'nhtMaLoai' => 2,
                'nhtMoTa' =>'nước giải khát',
                'nhtTrangThai' => 0,
            ],
            [
                'nhtMaSanPham' => 'CD003',
                'nhtTenSanPham' => 'mỳ hảo hảo',
                'nhtHinhAnh' => asset('img/san_pham/mỳ-hảo-hảo.webp'),
                'nhtSoLuong' => 200,
                'nhtDonGia' => 4000,
                'nhtMaLoai' => 3,
                'nhtMoTa' =>'ăn liền rẻ cho sinh viên',
                'nhtTrangThai' => 0,
            ],
            [
                'nhtMaSanPham' => 'DE004',
                'nhtTenSanPham' => 'bút bi',
                'nhtHinhAnh' => asset('img/san_pham/bút-bi.webp'),
                'nhtSoLuong' => 300,
                'nhtDonGia' => 7000,
                'nhtMaLoai' => 4,
                'nhtMoTa' =>'',
                'nhtTrangThai' => 0,
            ],
            [
                'nhtMaSanPham' => 'AM002',
                'nhtTenSanPham' => 'bim lays',
                'nhtHinhAnh' => asset('img/san_pham/bim-Lays.webp'),
                'nhtSoLuong' => 60,
                'nhtDonGia' => 7000,
                'nhtMaLoai' => 1,
                'nhtMoTa' => 'ngon hơn khi bạn một mình',
                'nhtTrangThai' => 0,
            ],
            [
                'nhtMaSanPham' => 'CP002',
                'nhtTenSanPham' => 'mì omachi',
                'nhtHinhAnh' => asset('img/san_pham/mì-omachi.webp'),
                'nhtSoLuong' => 150,
                'nhtDonGia' => 8000,
                'nhtMaLoai' => 3,
                'nhtMoTa' =>'mỳ ăn liền giá bình dân',
                'nhtTrangThai' => 0,
            ],
        ];
        foreach ($products as $product) {
            DB::table('nht_SAN_PHAM')->insert($product);
        }
    }
}