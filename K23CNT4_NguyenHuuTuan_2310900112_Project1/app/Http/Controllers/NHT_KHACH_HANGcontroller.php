<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\nht_KHACH_HANG; 
class NHT_KHACH_HANGcontroller extends Controller
{

    public function nhtList()
    {
        $khachhangs = nht_KHACH_HANG::all();
        return view('nhtAdmins.nhtkhachhang.nht-list',['khachhangs'=>$khachhangs]);
    }
    public function nhtDetail($id)
    {
        $nhtkhachhang = nht_KHACH_HANG::where('id',$id)->first();
        return view('nhtAdmins.nhtkhachhang.nht-detail',['nhtkhachhang'=>$nhtkhachhang]);
    }
    public function nhtCreate()
    {
        return view('nhtAdmins.nhtkhachhang.nht-create');
    }
    public function nhtCreateSubmit(Request $request)
    {
        $validate = $request->validate([
            'nhtMaKhachHang' => 'required|unique:nht_khach_hang,nhtMaKhachHang',
            'nhtHoTenKhachHang' => 'required|string',
            'nhtEmail' => 'required|email|unique:nht_khach_hang,nhtEmail',  
            'nhtMatKhau' => 'required|min:6',
            'nhtDienThoai' => 'required|numeric|unique:nht_khach_hang,nhtDienThoai',  
            'nhtDiaChi' => 'required|string',
        ]);

        $nhtkhachhang = new nht_KHACH_HANG;
        $nhtkhachhang->nhtMaKhachHang = $request->nhtMaKhachHang;
        $nhtkhachhang->nhtHoTenKhachHang = $request->nhtHoTenKhachHang;
        $nhtkhachhang->nhtEmail = $request->nhtEmail;
        $nhtkhachhang->nhtMatKhau = $request->nhtMatKhau;
        $nhtkhachhang->nhtDienThoai = $request->nhtDienThoai;
        $nhtkhachhang->nhtDiaChi = $request->nhtDiaChi;

        $nhtkhachhang->save();

        return redirect()->route('nhtadmins.nhtkhachhang');


    }

    public function nhtEdit($id)
    {
        $nhtkhachhang = nht_KHACH_HANG::where('id', $id)->first();
    
        if (!$nhtkhachhang) {
            return redirect()->route('nhtadmins.nhtkhachhang')->with('error', 'Khách hàng không tồn tại!');
        }
    
        return view('nhtAdmins.nhtkhachhang.nht-edit', ['nhtkhachhang' => $nhtkhachhang]);
    }
    
    public function nhtEditSubmit(Request $request, $id)
    {
        $validate = $request->validate([
            'nhtMaKhachHang' => 'required|unique:nht_khach_hang,nhtMaKhachHang,' . $id,
            'nhtHoTenKhachHang' => 'required|string',
            'nhtEmail' => 'required|email|unique:nht_khach_hang,nhtEmail,' . $id,  
            'nhtMatKhau' => 'nullable|min:6', 
            'nhtDienThoai' => 'required|numeric|unique:nht_khach_hang,nhtDienThoai,' . $id, 
            'nhtDiaChi' => 'required|string',
        ]);
    
        $nhtkhachhang = nht_KHACH_HANG::where('id', $id)->first();
    
        if (!$nhtkhachhang) {
            return redirect()->route('nhtadmins.nhtkhachhang')->with('error', 'Khách hàng không tồn tại!');
        }
    
        $nhtkhachhang->nhtMaKhachHang = $request->nhtMaKhachHang;
        $nhtkhachhang->nhtHoTenKhachHang = $request->nhtHoTenKhachHang;
        $nhtkhachhang->nhtEmail = $request->nhtEmail;
        $nhtkhachhang->nhtMatKhau = $request->nhtMatKhau;
        $nhtkhachhang->nhtDienThoai = $request->nhtDienThoai;
        $nhtkhachhang->nhtDiaChi = $request->nhtDiaChi;
    
        $nhtkhachhang->save();
    
        return redirect()->route('nhtadmins.nhtkhachhang')->with('success', 'Cập nhật khách hàng thành công!');
    }
    
    public function nhtDelete($id)
    {
        nht_KHACH_HANG::where('id',$id)->delete();
        return back()->with('khachhang_deleted','Đã xóa Khách hàng thành công!');
    }

}