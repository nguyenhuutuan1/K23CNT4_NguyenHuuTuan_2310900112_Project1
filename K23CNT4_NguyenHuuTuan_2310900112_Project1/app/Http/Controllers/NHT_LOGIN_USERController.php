<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\nht_KHACH_HANG;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class NHT_LOGIN_USERController extends Controller
{
    public function nhtLogin()
    {
        return view('nhtuser.login');
    }

    public function nhtLoginSubmit(Request $request)
{
    $request->validate([
        'nhtEmail' => 'required|email',
        'nhtMatKhau' => 'required|string',
    ]);

    $user = nht_KHACH_HANG::where('nhtEmail', $request->nhtEmail)->first();

    if ($user && Hash::check($request->nhtMatKhau, $user->nhtMatKhau)) {

        Auth::login($user);
        Session::put('username1', $user->nhtHoTenKhachHang); 
        Session::put('nhtEmail', $user->nhtEmail);  
        Session::put('nhtDienThoai', $user->nhtDienThoai);  
        Session::put('nhtDiaChi', $user->nhtDiaChi);  
        Session::put('nhtMaKhachHang', $user->nhtMaKhachHang);  

        return redirect()->route('nhtuser.home1')->with('message', 'Đăng Nhập Thành Công');
    } else {

        return redirect()->back()->withErrors(['nhtEmail' => 'Email hoặc Mật khẩu không đúng']);
    }
}

    
    

}