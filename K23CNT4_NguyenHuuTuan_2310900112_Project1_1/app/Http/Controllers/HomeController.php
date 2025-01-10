<?php

namespace App\Http\Controllers;

use App\Models\nht_SAN_PHAM;
use App\Models\nht_HOA_DON;
use App\Models\nht_CT_HOA_DON;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    // Trang chủ - hiển thị tất cả sản phẩm
    public function index()
    {
        // Lấy tất cả sản phẩm với phân trang, 6 sản phẩm mỗi trang
        $sanPhams = nht_SAN_PHAM::paginate(6);  // Sử dụng paginate() để phân trang
    
        // Trả về view và truyền dữ liệu sản phẩm vào
        return view('nhtuser.home', compact('sanPhams'));
    }
    
    public function index1()
    {
        // Lấy tất cả sản phẩm với phân trang, 6 sản phẩm mỗi trang
        $sanPhams = nht_SAN_PHAM::paginate(6);  // Sử dụng paginate() để phân trang
        
        // Trả về view và truyền dữ liệu sản phẩm vào
        return view('nhtuser.home1', compact('sanPhams'));
    }
    

    // Hiển thị chi tiết sản phẩm
    public function show($id)
    {
        // Lấy sản phẩm theo id
        $sanPham = nht_SAN_PHAM::findOrFail($id); 
        
        // Trả về view chi tiết sản phẩm
        return view('nhtuser.show', compact('sanPham')); 
    }






 


}   