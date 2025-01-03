<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\nht_SAN_PHAM; 
use App\Models\nht_LOAI_SAN_PHAM; 
use Illuminate\Support\Facades\Storage;  
class NHT_SAN_PHAMController extends Controller
{

    public function search(Request $request)
    {
        $search = $request->input('search');
    
        if ($search) {
            $products = nht_SAN_PHAM::where('nhtTenSanPham', 'like', '%' . $search . '%')->paginate(10);
        } else {
            $products = nht_SAN_PHAM::paginate(10);
        }
       
        return view('nhtuser.search', compact('products', 'search'));
    }

    public function search1(Request $request)
    {
        $search = $request->input('search');
    
        if ($search) {
            $products = nht_SAN_PHAM::where('nhtTenSanPham', 'like', '%' . $search . '%')->paginate(10);
        } else {
            $products = nht_SAN_PHAM::paginate(10);
        }
    
        return view('nhtuser.search1', compact('products', 'search'));
    }
    public function searchAdmins(Request $request)
    {
        $search = $request->input('search');
        if ($search) {
            $products = nht_SAN_PHAM::where('nhtTenSanPham', 'like', '%' . $search . '%')->paginate(10);
        } else {
            $products = nht_SAN_PHAM::paginate(10);
        }  
        return view('nhtAdmins.nhtsanpham.nht-search', compact('products', 'search'));
    }
    public function nhtList()
{


    $nhtsanphams = nht_SAN_PHAM::where('nhtTrangThai', 0); 
     $nhtsanphams = nht_SAN_PHAM::paginate(5);    
    
    return view('nhtAdmins.nhtsanpham.nht-list', ['nhtsanphams' => $nhtsanphams]);
}
    public function nhtDetail($id)
    {
        $nhtsanpham = nht_SAN_PHAM::where('id', $id)->first();

        return view('nhtAdmins.nhtsanpham.nht-detail', ['nhtsanpham' => $nhtsanpham]);
    }

      public function nhtCreate()
      {
            $nhtloaisanpham = nht_LOAI_SAN_PHAM::all();
          return view('nhtAdmins.nhtsanpham.nht-create',['nhtloaisanpham'=>$nhtloaisanpham]);
      }
     

   
public function nhtCreateSubmit(Request $request)
{


    $validatedData = $request->validate([
        'nhtMaSanPham' => 'required|unique:nht_SAN_PHAM,nhtMaSanPham',
        'nhtTenSanPham' => 'required|string|max:255',
        'nhtHinhAnh' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:10240', 
        'nhtSoLuong' => 'required|numeric|min:1',
        'nhtDonGia' => 'required|numeric',
        'nhtMaLoai' => 'required|exists:nht_LOAI_SAN_PHAM,id',
        'nhtTrangThai' => 'required|in:0,1',
    ]);


    $nhtsanpham = new nht_SAN_PHAM;
    $nhtsanpham->nhtMaSanPham = $request->nhtMaSanPham;
    $nhtsanpham->nhtTenSanPham = $request->nhtTenSanPham;

    if ($request->hasFile('nhtHinhAnh')) {
       
        $file = $request->file('nhtHinhAnh');

        if ($file->isValid()) {
            $fileName = $request->nhtMaSanPham . '.' . $file->extension();

            $file->storeAs('public/img/san_pham', $fileName);

            $nhtsanpham->nhtHinhAnh = 'img/san_pham/' . $fileName; 
        }
    }

    $nhtsanpham->nhtSoLuong = $request->nhtSoLuong;
    $nhtsanpham->nhtDonGia = $request->nhtDonGia;
    $nhtsanpham->nhtMaLoai = $request->nhtMaLoai;
    $nhtsanpham->nhtTrangThai = $request->nhtTrangThai;

    $nhtsanpham->save();

    return redirect()->route('nhtadims.nhtsanpham');
}

public function nhtdelete($id)
{
    nht_SAN_PHAM::where('id',$id)->delete();
return back()->with('sanpham_deleted','Đã xóa Sản Phẩm thành công!');
}

public function nhtEdit($id)
    {
    $nhtsanpham = nht_SAN_PHAM::findOrFail($id);

    $nhtloaisanpham = nht_LOAI_SAN_PHAM::all();

    return view('nhtAdmins.nhtsanpham.nht-edit', [
        'nhtsanpham' => $nhtsanpham,
        'nhtloaisanpham' => $nhtloaisanpham
    ]);
    }

    public function nhtEditSubmit(Request $request, $id)
{
    $request->validate([
        'nhtMaSanPham' => 'required|max:20',
        'nhtTenSanPham' => 'required|max:255',
        'nhtHinhAnh' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'nhtSoLuong' => 'required|integer',
        'nhtDonGia' => 'required|numeric',
        'nhtMaLoai' => 'required|max:10',
        'nhtTrangThai' => 'required|in:0,1',
    ]);

    $nhtsanpham = nht_SAN_PHAM::findOrFail($id);
    $nhtsanpham->nhtMaSanPham = $request->nhtMaSanPham;
    $nhtsanpham->nhtTenSanPham = $request->nhtTenSanPham;
    $nhtsanpham->nhtSoLuong = $request->nhtSoLuong;
    $nhtsanpham->nhtDonGia = $request->nhtDonGia;
    $nhtsanpham->nhtMaLoai = $request->nhtMaLoai;
    $nhtsanpham->nhtTrangThai = $request->nhtTrangThai;

    if ($request->hasFile('nhtHinhAnh')) {
        if ($nhtsanpham->nhtHinhAnh && Storage::disk('public')->exists('img/san_pham/' . $nhtsanpham->nhtHinhAnh)) {
            Storage::disk('public')->delete('img/san_pham/' . $nhtsanpham->nhtHinhAnh);
        }
        $imagePath = $request->file('nhtHinhAnh')->store('img/san_pham', 'public');
        $nhtsanpham->nhtHinhAnh = $imagePath;
    }
    $nhtsanpham->save();
    return redirect()->route('nhtadims.nhtsanpham')->with('success', 'Sản phẩm đã được cập nhật thành công.');
}

    

}