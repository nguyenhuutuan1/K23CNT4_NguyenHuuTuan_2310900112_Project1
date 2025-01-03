<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\nht_LOAI_SAN_PHAM; 
class NHT_LOAI_SAN_PHAMController extends Controller
{

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
            'nhtMaLoai' => 'required|unique:nht_LOAI_SAN_PHAM,nhtMaLoai',  
            'nhtTenLoai' => 'required|string|max:255',  
            'nhtTrangThai' => 'required|in:0,1',  
        ]);
        $nhtloaisanpham = new nht_LOAI_SAN_PHAM;
        $nhtloaisanpham->nhtMaLoai = $request->nhtMaLoai;
        $nhtloaisanpham->nhtTenLoai = $request->nhtTenLoai;
        $nhtloaisanpham->nhtTrangThai = $request->nhtTrangThai;

        $nhtloaisanpham->save();
       return redirect()->route('nhtadmins.nhtloaisanpham');
    }

    public function nhtEdit($id)
    {
        $nhtloaisanpham = nht_LOAI_SAN_PHAM::find($id);
    
        if (!$nhtloaisanpham) {
            return redirect()->route('nhtadmins.nhtloaisanpham')->with('error', 'Loại sản phẩm không tồn tại.');
        }
    
        return view('nhtAdmins.nhtloaisanpham.nht-edit', ['nhtloaisanpham' => $nhtloaisanpham]);
    }
    
    public function nhtEditSubmit(Request $request)
    {
        $validatedData = $request->validate([
            'nhtMaLoai' => 'required|string|max:255|unique:nht_LOAI_SAN_PHAM,nhtMaLoai,' . $request->id,  
            'nhtTenLoai' => 'required|string|max:255',   
            'nhtTrangThai' => 'required|in:0,1',  
        ]);
    
        $nhtloaisanpham = nht_LOAI_SAN_PHAM::find($request->id);
    
        if (!$nhtloaisanpham) {
            return redirect()->route('nhtadmins.nhtloaisanpham')->with('error', 'Loại sản phẩm không tồn tại.');
        }
    
        $nhtloaisanpham->nhtMaLoai = $request->nhtMaLoai;
        $nhtloaisanpham->nhtTenLoai = $request->nhtTenLoai;
        $nhtloaisanpham->nhtTrangThai = $request->nhtTrangThai;
    
        $nhtloaisanpham->save();
    
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