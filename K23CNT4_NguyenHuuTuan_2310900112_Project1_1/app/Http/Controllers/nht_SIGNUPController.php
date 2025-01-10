<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\nht_KHACH_HANG;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class nht_SIGNUPController extends Controller
{
    // Show the form to create a new customer
    public function nhtsignup()
    {
        return view('nhtuser.signup');
    }

    // Handle the form submission and store customer data
    public function nhtsignupSubmit(Request $request)
    {
        // Validate the input data
        $request->validate([
            'nhtHoTenKhachHang' => 'required|string|max:255',
            'nhtEmail' => 'required|email|unique:nht_khach_hang,nhtEmail',
            'nhtMatKhau' => 'required|min:6', // Remove the confirmed rule
            'nhtDienThoai' => 'required|numeric|unique:nht_khach_hang,nhtDienThoai',
            'nhtDiaChi' => 'required|string|max:255',
        ]);

        // Generate a new customer ID (nhtMaKhachHang)
        $lastCustomer = nht_KHACH_HANG::latest('nhtMaKhachHang')->first(); // Get the latest customer to determine the next ID
    
        // If no customers exist, start with KH001
        $newCustomerID = $lastCustomer
            ? 'KH' . str_pad((intval(substr($lastCustomer->nhtMaKhachHang, 2)) + 1), 3, '0', STR_PAD_LEFT)
            : 'KH001'; // First customer will be KH001

        // Create a new customer record
        $nhtkhachhang = new nht_KHACH_HANG;
        $nhtkhachhang->nhtMaKhachHang = $newCustomerID; // Automatically generated ID
        $nhtkhachhang->nhtHoTenKhachHang = $request->nhtHoTenKhachHang;
        $nhtkhachhang->nhtEmail = $request->nhtEmail;
        $nhtkhachhang->nhtMatKhau = Hash::make($request->nhtMatKhau); // Encrypt the password
        $nhtkhachhang->nhtDienThoai = $request->nhtDienThoai;
        $nhtkhachhang->nhtDiaChi = $request->nhtDiaChi;
        $nhtkhachhang->nhtNgayDangKy = now(); // Set the current timestamp for registration date
        $nhtkhachhang->nhtTrangThai = 0; // Set the default value for nhtTrangThai to 0 (inactive or unverified)

        // Save the new customer data
        try {
            $nhtkhachhang->save();
            // Redirect to login page on success with a success message
            return redirect()->route('nhtuser.login')->with('success', 'Đăng ký thành công, vui lòng đăng nhập!');
        } catch (\Exception $e) {
            // In case of error, return to the previous page with an error message
            return back()->with('error', 'Có lỗi xảy ra, vui lòng thử lại! Lỗi: ' . $e->getMessage());
        }
    }
}