<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\nht_KHACH_HANG; 
class nht_KHACH_HANGcontroller extends Controller
{
    //
    // CRUD
    // list
    public function nhtList()
    {
        $khachhangs = nht_KHACH_HANG::all();
        return view('nhtAdmins.nhtkhachhang.nht-list',['khachhangs'=>$khachhangs]);
    }
    // detail 
    public function nhtDetail($id)
    {
        $nhtkhachhang = nht_KHACH_HANG::where('id',$id)->first();
        return view('nhtAdmins.nhtkhachhang.nht-detail',['nhtkhachhang'=>$nhtkhachhang]);
    }
    // create
    public function nhtCreate()
    {
        return view('nhtAdmins.nhtkhachhang.nht-create');
    }
    //post
    public function nhtCreateSubmit(Request $request)
    {
        $validate = $request->validate([
            'nhtMaKhachHang' => 'required|unique:nht_khach_hang,nhtMaKhachHang',
            'nhtHoTenKhachHang' => 'required|string',
            'nhtEmail' => 'required|email|unique:nht_khach_hang,nhtEmail',  
            'nhtMatKhau' => 'required|min:6',
            'nhtDienThoai' => 'required|numeric|unique:nht_khach_hang,nhtDienThoai',  
            'nhtDiaChi' => 'required|string',
            'nhtNgayDangKy' => 'required|date',  
            'nhtTrangThai' => 'required|in:0,1,2',
        ]);

        $nhtkhachhang = new nht_KHACH_HANG;
        $nhtkhachhang->nhtMaKhachHang = $request->nhtMaKhachHang;
        $nhtkhachhang->nhtHoTenKhachHang = $request->nhtHoTenKhachHang;
        $nhtkhachhang->nhtEmail = $request->nhtEmail;
        $nhtkhachhang->nhtMatKhau = $request->nhtMatKhau;
        $nhtkhachhang->nhtDienThoai = $request->nhtDienThoai;
        $nhtkhachhang->nhtDiaChi = $request->nhtDiaChi;
        $nhtkhachhang->nhtNgayDangKy = $request->nhtNgayDangKy;
        $nhtkhachhang->nhtTrangThai = $request->nhtTrangThai;

        $nhtkhachhang->save();

        return redirect()->route('nhtadmins.nhtkhachhang');


    }

    // edit
    public function nhtEdit($id)
    {
        // Lấy khách hàng theo id
        $nhtkhachhang = nht_KHACH_HANG::where('id', $id)->first();
    
        // Kiểm tra nếu khách hàng không tồn tại
        if (!$nhtkhachhang) {
            return redirect()->route('nhtadmins.nhtkhachhang')->with('error', 'Khách hàng không tồn tại!');
        }
    
        // Trả về view để chỉnh sửa khách hàng
        return view('nhtAdmins.nhtkhachhang.nht-edit', ['nhtkhachhang' => $nhtkhachhang]);
    }
    
    public function nhtEditSubmit(Request $request, $id)
    {
        // Xác thực dữ liệu
        $validate = $request->validate([
            'nhtMaKhachHang' => 'required|unique:nht_khach_hang,nhtMaKhachHang,' . $id, // Bỏ qua kiểm tra unique cho bản ghi hiện tại
            'nhtHoTenKhachHang' => 'required|string',
            'nhtEmail' => 'required|email|unique:nht_khach_hang,nhtEmail,' . $id,  // Bỏ qua kiểm tra unique cho bản ghi hiện tại
            'nhtMatKhau' => 'nullable|min:6', // Mật khẩu không bắt buộc khi cập nhật
            'nhtDienThoai' => 'required|numeric|unique:nht_khach_hang,nhtDienThoai,' . $id,  // Bỏ qua kiểm tra unique cho bản ghi hiện tại
            'nhtDiaChi' => 'required|string',
            'nhtNgayDangKy' => 'required|date',
            'nhtTrangThai' => 'required|in:0,1,2',
        ]);
    
        // Lấy khách hàng theo id
        $nhtkhachhang = nht_KHACH_HANG::where('id', $id)->first();
    
        // Kiểm tra nếu khách hàng không tồn tại
        if (!$nhtkhachhang) {
            return redirect()->route('nhtadmins.nhtkhachhang')->with('error', 'Khách hàng không tồn tại!');
        }
    
        // Cập nhật các giá trị từ request
        $nhtkhachhang->nhtMaKhachHang = $request->nhtMaKhachHang;
        $nhtkhachhang->nhtHoTenKhachHang = $request->nhtHoTenKhachHang;
        $nhtkhachhang->nhtEmail = $request->nhtEmail;
        $nhtkhachhang->nhtMatKhau = $request->nhtMatKhau;
        $nhtkhachhang->nhtDienThoai = $request->nhtDienThoai;
        $nhtkhachhang->nhtDiaChi = $request->nhtDiaChi;
        $nhtkhachhang->nhtNgayDangKy = $request->nhtNgayDangKy;
        $nhtkhachhang->nhtTrangThai = $request->nhtTrangThai;
    
        // Lưu khách hàng đã cập nhật
        $nhtkhachhang->save();
    
        // Chuyển hướng đến danh sách khách hàng
        return redirect()->route('nhtadmins.nhtkhachhang')->with('success', 'Cập nhật khách hàng thành công!');
    }
    
    //delete
    public function nhtDelete($id)
    {
        nht_KHACH_HANG::where('id',$id)->delete();
        return back()->with('khachhang_deleted','Đã xóa Khách hàng thành công!');
    }

}