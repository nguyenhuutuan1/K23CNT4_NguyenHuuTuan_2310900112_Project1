<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\nht_CT_HOA_DON; 
use App\Models\nht_SAN_PHAM; 
use App\Models\nht_HOA_DON; 
use App\Models\nht_KHACH_HANG; 
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class NHT_CT_HOA_DONController extends Controller
{

public function show($sanPhamId)
{
    $sanPham = nht_SAN_PHAM::find($sanPhamId);

    $userId = Session::get('nhtMaKhachHang');

    $khachHang = nht_KHACH_HANG::find($userId);

    return view('nhtuser.hoadon', [
        'sanPham' => $sanPham,
        'khachHang' => $khachHang, 
    ]);
}
  
    public function store(Request $request)
    {
        $userId = Session::get('nhtMaKhachHang'); 
    
        if (!$userId) {
            return redirect()->route('nhtuser.login')->with('error', 'Vui lòng đăng nhập để tiếp tục!');
        }
    
        $khachhang = nht_KHACH_HANG::find($userId);
        if (!$khachhang) {
            return redirect()->route('nhtuser.login')->with('error', 'Khách hàng không tồn tại.');
        }
    
        $sanPham = nht_SAN_PHAM::find($request->nhtSanPhamId);
        if (!$sanPham) {
            return redirect()->back()->with('error', 'Sản phẩm không tồn tại.');
        }
    
        $nhtMaHoaDon = 'HD' . str_pad(rand(1, 9999), 4, '0', STR_PAD_LEFT); 
    
        $hoaDon = nht_HOA_DON::create([
            'nhtMaHoaDon' => $nhtMaHoaDon,
            'nhtMaKhachHang' => $khachhang->id,  
            'nhtNgayHoaDon' => Carbon::now()->toDateString(),
            'nhtNgayNhan' => Carbon::now()->addDays(3)->toDateString(),
            'nhtHoTenKhachHang' => $request->nhtHoTenKhachHang,
            'nhtEmail' => $request->nhtEmail,
            'nhtDienThoai' => $request->nhtDienThoai,
            'nhtDiaChi' => $request->nhtDiaChi,
            'nhtTongGiaTri' => $sanPham->nhtDonGia * $request->nhtSoLuong, 
            'nhtTrangThai' => 0, 
        ]);
     
        return redirect()->route('hoadon.show', ['hoaDonId' => $hoaDon->id, 'sanPhamId' => $sanPham->id]);
    }
    
public function create($hoaDonId, $sanPhamId)
{
 
    $hoaDon = nht_HOA_DON::find($hoaDonId);
    $sanPham = nht_SAN_PHAM::find($sanPhamId);


    if (!$hoaDon || !$sanPham) {
        return redirect()->route('hoadon.index')->with('error', 'Hóa đơn hoặc sản phẩm không tồn tại.');
    }
 $soLuong = request('nhtSoLuong', 1); 
    return view('nhtuser.cthoadon', [
        'hoaDon' => $hoaDon,
        'sanPham' => $sanPham,
        'soLuong' => $soLuong 
    ]);
}


public function cthoadonshow($hoaDonId, $sanPhamId)
{
    $hoaDon = nht_HOA_DON::findOrFail($hoaDonId);

    $chiTietHoaDon = nht_CT_HOA_DON::where('nhtHoaDonID', $hoaDonId)
                                    ->where('nhtSanPhamID', $sanPhamId)
                                    ->firstOrFail();

    return view('nhtuser.cthoadonshow', compact('hoaDon', 'chiTietHoaDon'));
}





    public function storecthoadon(Request $request)
    {
        $validated = $request->validate([
            'nhtSanPhamID' => 'required|exists:nht_SAN_PHAM,id',
            'nhtHoaDonID' => 'required|exists:nht_HOA_DON,id',
            'nhtSoLuong' => 'required|integer|min:1',
        ]);
    
        $sanPham = nht_SAN_PHAM::find($request->nhtSanPhamID);
        $hoaDon = nht_HOA_DON::find($request->nhtHoaDonID);
    
        if (!$sanPham || !$hoaDon) {
            return redirect()->back()->with('error', 'Sản phẩm hoặc hóa đơn không tồn tại.');
        }
    
        $chiTietHoaDon = nht_CT_HOA_DON::where('nhtHoaDonID', $hoaDon->id)
                                        ->where('nhtSanPhamID', $sanPham->id)
                                        ->first();
    
        if ($chiTietHoaDon) {
            $chiTietHoaDon->nhtSoLuongMua += $request->nhtSoLuong;  
            $chiTietHoaDon->nhtThanhTien = $chiTietHoaDon->nhtSoLuongMua * $sanPham->nhtDonGia; 
            $chiTietHoaDon->save(); 
        } else {
            $nhtThanhTien = $request->nhtSoLuong * $sanPham->nhtDonGia;
    
            nht_CT_HOA_DON::create([
                'nhtHoaDonID' => $hoaDon->id, 
                'nhtSanPhamID' => $sanPham->id, 
                'nhtSoLuongMua' => $request->nhtSoLuong, 
                'nhtDonGiaMua' => $sanPham->nhtDonGia, 
                'nhtThanhTien' => $nhtThanhTien, 
                'nhtTrangThai' => 1,  
            ]);
        }
    
        return redirect()->route('cthoadon.cthoadonshow', ['hoaDonId' => $hoaDon->id, 'sanPhamId' => $sanPham->id]);
    }

 public function nhtthanhtoan($product_id)
 {
      $sanPham = nht_SAN_PHAM::find($product_id);

     if (!$sanPham) {
         abort(404, 'Sản phẩm không tồn tại');
     }

    return view('nhtuser.thanhtoan', compact('sanPham'));
 }

 public function storeThanhtoan(Request $request)
 {
     $sanPham = nht_SAN_PHAM::find($request->product_id);

     if (!$sanPham) {
         return redirect()->route('home')->with('error', 'Sản phẩm không tồn tại');
     }

    $tongTien = $request->nhtSoLuong * $sanPham->nhtDonGia;

    
     return view('nhtuser.thanhtoan', [
         'sanPham' => $sanPham,
         'nhtSoLuong' => $request->nhtSoLuong,
         'tongTien' => $tongTien
     ]);
 }

    public function nhtList()
    {
        $nhtcthoadons = nht_CT_HOA_DON::all();
        return view('nhtAdmins.nhtcthoadon.nht-list',['nhtcthoadons'=>$nhtcthoadons]);
    }
    public function nhtDetail($id)
    {
        $nhtcthoadon = nht_CT_HOA_DON::where('id', $id)->first();

        return view('nhtAdmins.nhtcthoadon.nht-detail', ['nhtcthoadon' => $nhtcthoadon]);
    }

     public function nhtCreate()
     {
         $nhthoadon = nht_HOA_DON::all();
         $nhtsanpham = nht_SAN_PHAM::all();
         return view('nhtAdmins.nhtcthoadon.nht-create',['nhthoadon'=>$nhthoadon,'nhtsanpham'=>$nhtsanpham]);
     }
     public function nhtCreateSubmit(Request $request)
     {
         $validate = $request->validate([
             'nhtHoaDonID' => 'required|exists:nht_hoa_don,id',
             'nhtSanPhamID' => 'required|exists:nht_san_pham,id',
             'nhtSoLuongMua' => 'required|numeric',  
             'nhtDonGiaMua' => 'required|numeric',
             'nhtThanhTien' => 'required|numeric',  
             'nhtTrangThai' => 'required|in:0,1,2',
         ]);
     
         $nhtcthoadon = new nht_CT_HOA_DON;
     
         $nhtcthoadon->nhtHoaDonID = $request->nhtHoaDonID;
         $nhtcthoadon->nhtSanPhamID = $request->nhtSanPhamID;  
         $nhtcthoadon->nhtSoLuongMua = $request->nhtSoLuongMua;
         $nhtcthoadon->nhtDonGiaMua = $request->nhtDonGiaMua;
         $nhtcthoadon->nhtThanhTien = $request->nhtThanhTien;
         $nhtcthoadon->nhtTrangThai = $request->nhtTrangThai;
     
        
     
         $nhtcthoadon->save();
     
         return redirect()->route('nhtadmins.nhtcthoadon');
     }

      public function nhtEdit($id)
{
    $nhthoadon = nht_HOA_DON::all(); 
    $nhtsanpham = nht_SAN_PHAM::all(); 

    $nhtcthoadon = nht_CT_HOA_DON::where('id', $id)->first();

    if (!$nhtcthoadon) {
        return redirect()->route('nhtadmins.nhtcthoadon')->with('error', 'Không tìm thấy chi tiết hóa đơn!');
    }

    return view('nhtAdmins.nhtcthoadon.nht-edit', [
        'nhthoadon' => $nhthoadon,
        'nhtsanpham' => $nhtsanpham,
        'nhtcthoadon' => $nhtcthoadon
    ]);
}

      public function nhtEditSubmit(Request $request,$id)
      {
          $validate = $request->validate([
              'nhtHoaDonID' => 'required|exists:nht_hoa_don,id',
              'nhtSanPhamID' => 'required|exists:nht_san_pham,id',
              'nhtSoLuongMua' => 'required|numeric',  
              'nhtDonGiaMua' => 'required|numeric',
              'nhtThanhTien' => 'required|numeric',  
              'nhtTrangThai' => 'required|in:0,1,2',
          ]);
         
      
          $nhtcthoadon = nht_CT_HOA_DON::where('id', $id)->first();
      
          $nhtcthoadon->nhtHoaDonID = $request->nhtHoaDonID;
          $nhtcthoadon->nhtSanPhamID = $request->nhtSanPhamID;  
          $nhtcthoadon->nhtSoLuongMua = $request->nhtSoLuongMua;
          $nhtcthoadon->nhtDonGiaMua = $request->nhtDonGiaMua;
          $nhtcthoadon->nhtThanhTien = $request->nhtThanhTien;
          $nhtcthoadon->nhtTrangThai = $request->nhtTrangThai;
      
         
      
          $nhtcthoadon->save();
      
          return redirect()->route('nhtadmins.nhtcthoadon');
      }

        public function nhtDelete($id)
        {
            nht_CT_HOA_DON::where('id',$id)->delete();
            return back()->with('cthoadon_deleted','Đã xóa Khách hàng thành công!');
        }
     
}