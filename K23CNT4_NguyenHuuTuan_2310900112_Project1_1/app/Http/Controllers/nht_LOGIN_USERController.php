<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\nht_KHACH_HANG;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class nht_LOGIN_USERController extends Controller
{
    // Show login form
    public function nhtLogin()
    {
        return view('nhtuser.login');
    }

    // Handle login form submission
    public function nhtLoginSubmit(Request $request)
{
    // Validate the input data
    $request->validate([
        'nhtEmail' => 'required|email',
        'nhtMatKhau' => 'required|string',
    ]);

    // Tìm người dùng theo email
    $user = nht_KHACH_HANG::where('nhtEmail', $request->nhtEmail)->first();

    // Kiểm tra nếu người dùng tồn tại và mật khẩu đúng
    if ($user && Hash::check($request->nhtMatKhau, $user->nhtMatKhau)) {
        // Đăng nhập người dùng
        Auth::login($user);

        // Lưu thông tin người dùng vào session
        Session::put('username1', $user->nhtHoTenKhachHang);  // Lưu tên người dùng
        Session::put('nhtEmail', $user->nhtEmail);  // Lưu email
        Session::put('nhtDienThoai', $user->nhtDienThoai);  // Lưu số điện thoại
        Session::put('nhtDiaChi', $user->nhtDiaChi);  // Lưu địa chỉ
        Session::put('nhtMaKhachHang', $user->nhtMaKhachHang);  // Lưu mã khách hàng

        // Lưu trữ các thông tin cần thiết vào session

        // Chuyển hướng người dùng tới trang chủ sau khi đăng nhập thành công
        return redirect()->route('nhtuser.home1')->with('message', 'Đăng Nhập Thành Công');
    } else {
        // Nếu thông tin không chính xác, trả về lỗi
        return redirect()->back()->withErrors(['nhtEmail' => 'Email hoặc Mật khẩu không đúng']);
    }
}

    
    

}