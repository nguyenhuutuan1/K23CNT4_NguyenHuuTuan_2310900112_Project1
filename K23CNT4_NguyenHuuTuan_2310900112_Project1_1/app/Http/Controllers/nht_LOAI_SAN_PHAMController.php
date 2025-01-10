<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\nht_LOAI_SAN_PHAM; // Sử dụng Model User để thao tác với cơ sở dữ liệu
class nht_LOAI_SAN_PHAMController extends Controller
{
    //admin CRUD
    // list
    public function nhtList()
    {
        $nhtloaisanphams = nht_LOAI_SAN_PHAM::all();
        return view('nhtAdmins.nhtloaisanpham.nht-list',['nhtloaisanphams'=>$nhtloaisanphams]);
    }

    //create
    public function nhtCreate()
    {
        return view('nhtAdmins.nhtloaisanpham.nht-create');
    }

    public function nhtCreateSunmit(Request $request)
    {
        $validatedData = $request->validate([
            'nhtMaLoai' => 'required|unique:nht_LOAI_SAN_PHAM,nhtMaLoai',  // Kiểm tra mã loại không trống và duy nhất
            'nhtTenLoai' => 'required|string|max:255',  // Kiểm tra tên loại không trống và là chuỗi
            'nhtTrangThai' => 'required|in:0,1',  // Trạng thái phải là 0 hoặc 1
        ]);
        //ghi dữ liệu xuống db
        $nhtloaisanpham = new nht_LOAI_SAN_PHAM;
        $nhtloaisanpham->nhtMaLoai = $request->nhtMaLoai;
        $nhtloaisanpham->nhtTenLoai = $request->nhtTenLoai;
        $nhtloaisanpham->nhtTrangThai = $request->nhtTrangThai;

        $nhtloaisanpham->save();
       return redirect()->route('nhtadmins.nhtloaisanpham');
    }

    public function nhtEdit($id)
    {
        // Retrieve the product by the primary key (id)
        $nhtloaisanpham = nht_LOAI_SAN_PHAM::find($id);
    
        // If the product does not exist, redirect with an error message
        if (!$nhtloaisanpham) {
            return redirect()->route('nhtadmins.nhtloaisanpham')->with('error', 'Loại sản phẩm không tồn tại.');
        }
    
        // Pass the product data to the edit view
        return view('nhtAdmins.nhtloaisanpham.nht-edit', ['nhtloaisanpham' => $nhtloaisanpham]);
    }
    
    public function nhtEditSubmit(Request $request)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'nhtMaLoai' => 'required|string|max:255|unique:nht_LOAI_SAN_PHAM,nhtMaLoai,' . $request->id,  // Bỏ qua nhtMaLoai của bản ghi hiện tại
            'nhtTenLoai' => 'required|string|max:255',   
            'nhtTrangThai' => 'required|in:0,1',  // Validation for nhtTrangThai (0 or 1)
        ]);
    
        // Find the product by id
        $nhtloaisanpham = nht_LOAI_SAN_PHAM::find($request->id);
    
        // Check if the product exists
        if (!$nhtloaisanpham) {
            return redirect()->route('nhtadmins.nhtloaisanpham')->with('error', 'Loại sản phẩm không tồn tại.');
        }
    
        // Update the product with validated data
        $nhtloaisanpham->nhtMaLoai = $request->nhtMaLoai;
        $nhtloaisanpham->nhtTenLoai = $request->nhtTenLoai;
        $nhtloaisanpham->nhtTrangThai = $request->nhtTrangThai;
    
        // Save the updated product
        $nhtloaisanpham->save();
    
        // Redirect back to the list page with a success message
        return redirect()->route('nhtadmins.nhtloaisanpham')->with('success', 'Cập nhật loại sản phẩm thành công.');
    }
    
    

    public function nhtGetDetail($id)
    {
        $nhtloaisanpham = nht_LOAI_SAN_PHAM::where('id', $id)->first();
        return view('nhtAdmins.nhtloaisanpham.nht-detail',['nhtloaisanpham'=>$nhtloaisanpham]);

    }

    public function nhtDelete($id)
    {
        nht_LOAI_SAN_PHAM::where('id',$id)->delete();
    return back()->with('loaisanpham_deleted','Đã xóa Loại Sản Phẩm thành công!');
    }

}