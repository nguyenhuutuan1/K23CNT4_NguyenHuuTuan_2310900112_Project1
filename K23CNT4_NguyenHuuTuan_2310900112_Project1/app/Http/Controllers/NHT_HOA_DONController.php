<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\nht_HOA_DON; 
use App\Models\nht_KHACH_HANG; 
use App\Models\nht_SAN_PHAM; 
class NHT_HOA_DONController extends Controller
{
    public function show($hoaDonId,$sanPhamId)
    {
        $hoaDon = nht_HOA_DON::findOrFail($hoaDonId);
        $sanPham = nht_SAN_PHAM::findOrFail($sanPhamId);

        return view('nhtuser.hoadonshow', compact('hoaDon','sanPham'));
    }


    public function nhtList()
    {
        $nhthoadons = nht_HOA_DON::all();
        return view('nhtAdmins.nhthoadon.nht-list',['nhthoadons'=>$nhthoadons]);
    }
    public function nhtDetail($id)
    {

        $nhthoadon = nht_HOA_DON::where('id', $id)->first();


        return view('nhtAdmins.nhthoadon.nht-detail', ['nhthoadon' => $nhthoadon]);
    }

    public function nhtCreate()
    {
        $nhtkhachhang = nht_KHACH_HANG::all();
        return view('nhtAdmins.nhthoadon.nht-create',['nhtkhachhang'=>$nhtkhachhang]);
    }

    public function nhtCreateSubmit(Request $request)
    {
        $validate = $request->validate([
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
    
        $nhthoadon->save();
    
        return redirect()->route('nhtadmins.nhthoadon');
    }
    


    public function nhtEdit($id)
    {
        $nhthoadon = nht_HOA_DON::where('id', $id)->first();
        $nhtkhachhang = nht_KHACH_HANG::all();
        return view('nhtAdmins.nhthoadon.nht-edit',['nhtkhachhang'=>$nhtkhachhang,'nhthoadon'=>$nhthoadon]);
    }
    public function nhtEditSubmit(Request $request,$id)
    {
        $validate = $request->validate([
            'nhtMaHoaDon' => 'required|unique:nht_hoa_don,nhtMaHoaDon,'. $id,
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
    
        $nhthoadon = nht_HOA_DON::where('id', $id)->first();
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
    
        $nhthoadon->save();
    
        return redirect()->route('nhtadmins.nhthoadon');
    }
    
        public function nhtDelete($id)
        {
            nht_HOA_DON::where('id',$id)->delete();
            return back()->with('hoadon_deleted','Đã xóa Khách hàng thành công!');
        }
}