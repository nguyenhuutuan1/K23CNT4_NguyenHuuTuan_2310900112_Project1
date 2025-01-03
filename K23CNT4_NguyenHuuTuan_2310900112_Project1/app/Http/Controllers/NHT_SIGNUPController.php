<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\nht_KHACH_HANG;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class nht_SIGNUPController extends Controller
{
    public function nhtsignup()
    {
        return view('nhtuser.signup');
    }

    public function nhtsignupSubmit(Request $request)
    {
        $request->validate([
            'nhtHoTenKhachHang' => 'required|string|max:255',
            'nhtEmail' => 'required|email|unique:nht_khach_hang,nhtEmail',
            'nhtMatKhau' => 'required|min:6',
            'nhtDienThoai' => 'required|numeric|unique:nht_khach_hang,nhtDienThoai',
            'nhtDiaChi' => 'required|string|max:255',
        ]);

        $lastCustomer = nht_KHACH_HANG::latest('nhtMaKhachHang')->first(); 
    
        if ($lastCustomer) {
            $newCustomerID = 'KH' . str_pad((substr($lastCustomer->nhtMaKhachHang, 2) + 1), 3, '0', STR_PAD_LEFT);  
        } else {
            $newCustomerID = 'KH001'; 
        }
    
        $nhtkhachhang = new nht_KHACH_HANG;
        $nhtkhachhang->nhtMaKhachHang = $newCustomerID; 
        $nhtkhachhang->nhtHoTenKhachHang = $request->nhtHoTenKhachHang;
        $nhtkhachhang->nhtEmail = $request->nhtEmail;
        $nhtkhachhang->nhtMatKhau = $request->nhtMatKhau; 
        $nhtkhachhang->nhtDienThoai = $request->nhtDienThoai;
        $nhtkhachhang->nhtDiaChi = $request->nhtDiaChi;
        $nhtkhachhang->nhtNgayDangKy = now(); 
        $nhtkhachhang->nhtTrangThai = 0; 
    
        try {
            $nhtkhachhang->save();
            return redirect()->route('nhtuser.login')->with('success', 'Đăng ký thành công, vui lòng đăng nhập!');
        } catch (\Exception $e) {
            return back()->with('error', 'Có lỗi xảy ra, vui lòng thử lại!');
        }
    }
}