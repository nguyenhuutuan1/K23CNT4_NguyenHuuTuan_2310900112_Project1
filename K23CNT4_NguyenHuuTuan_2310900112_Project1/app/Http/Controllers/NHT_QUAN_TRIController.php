<?php

namespace App\Http\Controllers;

use App\Models\nht_QUAN_TRI; // Thêm dòng này để sử dụng Model
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session; // Thêm dòng này để sử dụng session

class NHT_QUAN_TRIController extends Controller
{
    // GET login (authentication)
    public function nhtLogin()
    {
        return view('nhtAdmins.nht-login');
    }

    // POST login (authentication)
    public function nhtLoginSubmit(Request $request)
    {
        // Validate tài khoản và mật khẩu
        $request->validate([
            'nhtTaiKhoan' => 'required|string',
            'nhtMatKhau' => 'required|string',
        ]);

        // Tìm người dùng trong bảng nht_QUAN_TRI
        $user = nht_QUAN_TRI::where('nhtTaiKhoan', $request->nhtTaiKhoan)->first();

        // Kiểm tra nếu người dùng tồn tại và mật khẩu đúng
        if ($user && Hash::check($request->nhtMatKhau, $user->nhtMatKhau)) {
            // Đăng nhập thành công
            Auth::loginUsingId($user->id);

            // Lưu tên tài khoản vào session
            Session::put('username', $user->nhtTaiKhoan);

            // Chuyển hướng về trang admin với thông báo thành công
            return redirect('/nht-admins')->with('message', 'Đăng Nhập Thành Công');
        } else {
            // Thông báo lỗi nếu tài khoản hoặc mật khẩu sai
            return redirect()->back()->withErrors(['nhtMatKhau' => 'Tài khoản hoặc mật khẩu không đúng']);
        }
    }

    public function nhtlist()
{
    $nhtquantris = nht_QUAN_TRI::all(); // Lấy tất cả quản trị viên
    return view('nhtAdmins.nhtquantri.nht-list', ['nhtquantris'=>$nhtquantris]);
}

public function nhtDetail($id)
    {
        $nhtquantri = nht_QUAN_TRI::where('id', $id)->first();
        return view('nhtAdmins.nhtquantri.nht-detail',['nhtquantri'=>$nhtquantri]);

    }

public function nhtCreate()
{
    return view('nhtAdmins.nhtquantri.nht-create');
}


public function nhtCreateSubmit(Request $request)
{

    $request->validate([
        'nhtTaiKhoan' => 'required|string|unique:nht_quan_tri,nhtTaiKhoan',
        'nhtMatKhau' => 'required|string|min:6',
        'nhtTrangThai' => 'required|in:0,1', 
    ]);

    $nhtquantri = new nht_QUAN_TRI();
    $nhtquantri->nhtTaiKhoan = $request->nhtTaiKhoan;
    $nhtquantri->nhtMatKhau = Hash::make($request->nhtMatKhau); 
    $nhtquantri->nhtTrangThai = $request->nhtTrangThai;
    $nhtquantri->save();

    return redirect()->route('nhtadmins.nhtquantri')->with('success', 'Thêm quản trị viên thành công');
}

public function nhtEdit($id)
{
    $nhtquantri = nht_QUAN_TRI::find($id); 
    if (!$nhtquantri) {
        return redirect()->route('nhtadmins.nhtquantri')->with('error', 'Không tìm thấy quản trị viên!');
    }
    return view('nhtAdmins.nhtquantri.nht-edit', ['nhtquantri'=>$nhtquantri]);
}

public function nhtEditSubmit(Request $request, $id)
{
    $request->validate([
        'nhtTaiKhoan' => 'required|string|unique:nht_quan_tri,nhtTaiKhoan,' . $id,
        'nhtMatKhau' => 'nullable|string|min:6', 
        'nhtTrangThai' => 'required|in:0,1',
    ]);

    $nhtquantri = nht_QUAN_TRI::find($id);
    if (!$nhtquantri) {
        return redirect()->route('nhtadmins.nhtquantri')->with('error', 'Không tìm thấy quản trị viên!');
    }

    $nhtquantri->nhtTaiKhoan = $request->nhtTaiKhoan;
    if ($request->nhtMatKhau) {
        $nhtquantri->nhtMatKhau = Hash::make($request->nhtMatKhau); 
    }
    $nhtquantri->nhtTrangThai = $request->nhtTrangThai;
    $nhtquantri->save();

    return redirect()->route('nhtadmins.nhtquantri')->with('success', 'Cập nhật quản trị viên thành công');
}

public function nhtDelete($id)
{
    $nhtquantri = nht_QUAN_TRI::find($id); 
    if (!$nhtquantri) {
        return redirect()->route('nhtadmins.nhtquantri')->with('error', 'Không tìm thấy quản trị viên!');
    }
    $nhtquantri->delete();

    return redirect()->route('nhtadmins.nhtquantri')->with('success', 'Xóa quản trị viên thành công');
}



}