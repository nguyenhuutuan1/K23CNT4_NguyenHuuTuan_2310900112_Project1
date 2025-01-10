<?php

namespace App\Http\Controllers;
use Carbon\Carbon;

use Illuminate\Http\Request;
use App\Models\nht_SAN_PHAM; 
use App\Models\nht_KHACH_HANG; 
use App\Models\nht_TIN_TUC; 
class nht_DANH_SACH_QUAN_TRIController extends Controller
{
    //
        // Danh mục
        public function danhmuc()
        {
            // Truy vấn số lượng sản phẩm
            $productCount = nht_SAN_PHAM::count();
        
            // Truy vấn số lượng người dùng
            $userCount = nht_KHACH_HANG::count();
            $ttCount = nht_TIN_TUC::count();

        
            // Trả về view và truyền cả productCount và userCount
            return view('nhtAdmins.nhtdanhsachquantri.nhtdanhmuc', compact('productCount', 'userCount','ttCount'));
        }

        public function nguoidung()
        {
            $nhtnguoidung = nht_KHACH_HANG::all();
        
            // Chuyển đổi nhtNgayDangKy thành đối tượng Carbon thủ công
            foreach ($nhtnguoidung as $user) {
                // Chuyển đổi ngày tháng thành đối tượng Carbon nếu chưa phải là Carbon
                $user->nhtNgayDangKy = Carbon::parse($user->nhtNgayDangKy);
            }
        
            return view('nhtAdmins.nhtdanhsachquantri.nhtdanhmuc.nhtnguoidung', ['nhtnguoidung' => $nhtnguoidung]);
        }
        

        public function tintuc()
        {
            // Retrieve all news articles from the database (assuming you have a model named nht_TIN_TUC)
            $nhttintucs = nht_TIN_TUC::all();  // Fetching all articles
        
            // Loop through articles and add the full URL to the image
            foreach ($nhttintucs as $article) {
                // Assuming nhtHinhAnh stores the image name, we'll prepend the 'public/storage' path
                $article->image_url = asset('storage/' . $article->nhtHinhAnh);
            }
        
            // Return the view and pass the articles to it
            return view('nhtAdmins.nhtdanhsachquantri.nhtdanhmuc.nhttintuc', [
                'nhttintucs' => $nhttintucs, // Passing the news articles to the view
            ]);
        }
        
    

    // Hiển thị danh sách sản phẩm
    public function sanpham()
    {
        $nhtsanphams = nht_SAN_PHAM::all(); // Lấy tất cả sản phẩm
        return view('nhtAdmins.nhtdanhsachquantri.nhtdanhmuc.nhtsanpham', ['nhtsanphams' => $nhtsanphams]);
    }

    // Hiển thị mô tả chi tiết sản phẩm
    public function mota($id)
    {
        // Lấy sản phẩm theo id
        $product = nht_SAN_PHAM::find($id);
        
        // Kiểm tra nếu sản phẩm không tồn tại
        if (!$product) {
            return redirect()->route('nhtAdmins.nhtdanhsachquantri.danhmuc.sanpham')
                             ->with('error', 'Sản phẩm không tồn tại.');
        }

        // Trả về view với thông tin sản phẩm
        return view('nhtAdmins.nhtdanhsachquantri.nhtdanhmuc.nhtmota', ['product' => $product]);
    }
}