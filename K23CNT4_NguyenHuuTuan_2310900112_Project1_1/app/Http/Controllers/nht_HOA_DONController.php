<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\nht_HOA_DON; 
use App\Models\nht_KHACH_HANG; 
use App\Models\nht_SAN_PHAM; 

class nht_HOA_DONController extends Controller
{
    // Hiển thị chi tiết hóa đơn và sản phẩm
    public function show($hoaDonId, $sanPhamId)
    {
        // Lấy hóa đơn và sản phẩm từ ID
        $hoaDon = nht_HOA_DON::findOrFail($hoaDonId);
        $sanPham = nht_SAN_PHAM::findOrFail($sanPhamId);

        // Trả về view để hiển thị thông tin hóa đơn và sản phẩm
        return view('nhtuser.hoadonshow', compact('hoaDon', 'sanPham'));
    }

    // List hóa đơn - Admin CRUD
    public function nhtList()
    {
        // Lấy tất cả hóa đơn
        $nhthoadons = nht_HOA_DON::all();
        return view('nhtAdmins.nhthoadon.nht-list', ['nhthoadons' => $nhthoadons]);
    }

    // Hiển thị chi tiết hóa đơn - Admin CRUD
    public function nhtDetail($id)
    {
        // Tìm hóa đơn theo ID
        $nhthoadon = nht_HOA_DON::findOrFail($id);

        // Trả về view và truyền thông tin hóa đơn
        return view('nhtAdmins.nhthoadon.nht-detail', ['nhthoadon' => $nhthoadon]);
    }

    // Tạo mới hóa đơn - Admin CRUD
    public function nhtCreate()
    {
        // Lấy tất cả khách hàng
        $nhtkhachhang = nht_KHACH_HANG::all();
        return view('nhtAdmins.nhthoadon.nht-create', ['nhtkhachhang' => $nhtkhachhang]);
    }

    // Xử lý khi gửi form tạo mới hóa đơn
    public function nhtCreateSubmit(Request $request)
    {
        // Xác thực dữ liệu yêu cầu
        $validated = $request->validate([
            'nhtMaHoaDon' => 'required|unique:nht_hoa_don,nhtMaHoaDon',
            'nhtMaKhachHang' => 'required|exists:nht_khach_hang,id',
            'nhtNgayHoaDon' => 'required|date',
            'nhtNgayNhan' => 'required|date',
            'nhtHoTenKhachHang' => 'required|string',
            'nhtEmail' => 'required|email',
            'nhtDienThoai' => 'required|numeric',
            'nhtDiaChi' => 'required|string',
            'nhtTongGiaTri' => 'required|numeric',
            'nhtTrangThai' => 'required|in:0,1,2',
        ]);

        // Tạo mới hóa đơn
        $nhthoadon = new nht_HOA_DON;
        $nhthoadon->nhtMaHoaDon = $request->nhtMaHoaDon;
        $nhthoadon->nhtMaKhachHang = $request->nhtMaKhachHang;
        $nhthoadon->nhtHoTenKhachHang = $request->nhtHoTenKhachHang;
        $nhthoadon->nhtEmail = $request->nhtEmail;
        $nhthoadon->nhtDienThoai = $request->nhtDienThoai;
        $nhthoadon->nhtDiaChi = $request->nhtDiaChi;
        $nhthoadon->nhtTongGiaTri = (double) $request->nhtTongGiaTri;
        $nhthoadon->nhtTrangThai = $request->nhtTrangThai;
        $nhthoadon->nhtNgayHoaDon = $request->nhtNgayHoaDon;
        $nhthoadon->nhtNgayNhan = $request->nhtNgayNhan;

        // Lưu hóa đơn vào cơ sở dữ liệu
        $nhthoadon->save();

        // Chuyển hướng về danh sách hóa đơn
        return redirect()->route('nhtadmins.nhthoadon');
    }

    // Sửa hóa đơn - Admin CRUD
    public function nhtEdit($id)
    {
        // Lấy hóa đơn cần sửa và danh sách khách hàng
        $nhthoadon = nht_HOA_DON::findOrFail($id);
        $nhtkhachhang = nht_KHACH_HANG::all();
        return view('nhtAdmins.nhthoadon.nht-edit', ['nhtkhachhang' => $nhtkhachhang, 'nhthoadon' => $nhthoadon]);
    }

    // Xử lý khi gửi form sửa hóa đơn
    public function nhtEditSubmit(Request $request, $id)
    {
        // Xác thực dữ liệu yêu cầu
        $validated = $request->validate([
            'nhtMaHoaDon' => 'required|unique:nht_hoa_don,nhtMaHoaDon,' . $id,
            'nhtMaKhachHang' => 'required|exists:nht_khach_hang,id',
            'nhtNgayHoaDon' => 'required|date',
            'nhtNgayNhan' => 'required|date',
            'nhtHoTenKhachHang' => 'required|string',
            'nhtEmail' => 'required|email',
            'nhtDienThoai' => 'required|numeric',
            'nhtDiaChi' => 'required|string',
            'nhtTongGiaTri' => 'required|numeric',
            'nhtTrangThai' => 'required|in:0,1,2',
        ]);

        // Cập nhật hóa đơn
        $nhthoadon = nht_HOA_DON::findOrFail($id);
        $nhthoadon->nhtMaHoaDon = $request->nhtMaHoaDon;
        $nhthoadon->nhtMaKhachHang = $request->nhtMaKhachHang;
        $nhthoadon->nhtHoTenKhachHang = $request->nhtHoTenKhachHang;
        $nhthoadon->nhtEmail = $request->nhtEmail;
        $nhthoadon->nhtDienThoai = $request->nhtDienThoai;
        $nhthoadon->nhtDiaChi = $request->nhtDiaChi;
        $nhthoadon->nhtTongGiaTri = (double) $request->nhtTongGiaTri;
        $nhthoadon->nhtTrangThai = $request->nhtTrangThai;
        $nhthoadon->nhtNgayHoaDon = $request->nhtNgayHoaDon;
        $nhthoadon->nhtNgayNhan = $request->nhtNgayNhan;

        // Lưu cập nhật vào cơ sở dữ liệu
        $nhthoadon->save();

        // Chuyển hướng về danh sách hóa đơn
        return redirect()->route('nhtadmins.nhthoadon');
    }

    // Xóa hóa đơn - Admin CRUD
    public function nhtDelete($id)
    {
        // Xóa hóa đơn theo ID
        nht_HOA_DON::where('id', $id)->delete();
        
        // Quay lại trang trước và thông báo xóa thành công
        return back()->with('hoadon_deleted', 'Đã xóa hóa đơn thành công!');
    }
}