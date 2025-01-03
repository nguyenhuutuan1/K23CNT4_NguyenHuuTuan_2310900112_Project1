<?php

namespace App\Http\Controllers;
use Carbon\Carbon;

use Illuminate\Http\Request;
use App\Models\nht_SAN_PHAM; 
use App\Models\nht_KHACH_HANG; 
use App\Models\nht_TIN_TUC; 
class NHT_DANH_SACH_QUAN_TRIController extends Controller
{

        public function danhmuc()
        {
            $productCount = nht_SAN_PHAM::count();
        
            $userCount = nht_KHACH_HANG::count();

        
            return view('nhtAdmins.nhtdanhsachquantri.nhtdanhmuc', compact('productCount', 'userCount','ttCount'));
        }

        public function nguoidung()
        {
            $nhtnguoidung = nht_KHACH_HANG::all();
        
            foreach ($nhtnguoidung as $user) {
        
                $user->nhtNgayDangKy = Carbon::parse($user->nhtNgayDangKy);
            }
        
            return view('nhtAdmins.nhtdanhsachquantri.nhtdanhmuc.nhtnguoidung', ['nhtnguoidung' => $nhtnguoidung]);
        }

    public function sanpham()
    {
        $nhtsanphams = nht_SAN_PHAM::all(); 
        return view('nhtAdmins.nhtdanhsachquantri.nhtdanhmuc.nhtsanpham', ['nhtsanphams' => $nhtsanphams]);
    }


    public function mota($id)
    {

        $product = nht_SAN_PHAM::find($id);

        if (!$product) {
            return redirect()->route('nhtAdmins.nhtdanhsachquantri.danhmuc.sanpham')
                             ->with('error', 'Sản phẩm không tồn tại.');
        }

        return view('nhtAdmins.nhtdanhsachquantri.nhtdanhmuc.nhtmota', ['product' => $product]);
    }
}