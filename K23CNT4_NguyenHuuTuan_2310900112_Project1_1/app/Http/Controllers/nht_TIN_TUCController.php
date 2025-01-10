<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\nht_TIN_TUC;  // Assuming you have the model for TIN_TUC
use Illuminate\Support\Facades\Storage;

class nht_TIN_TUCController extends Controller
{
    // List all news ----------------------------------------------------------------------
 // List all news with pagination
public function nhtList()
{
    $nhttinTucs = nht_TIN_TUC::all();
        
    // Phân trang kết quả, thay 10 bằng số lượng bạn muốn mỗi trang
    $nhttinTucs = nht_TIN_TUC::paginate(10);
    
    
    // Return the view with the paginated data
    return view('nhtAdmins.nhttintuc.nht-list', ['nhttinTucs' => $nhttinTucs]);
}

    

    // Show the detail of a specific news item -------------------------------------------
    public function nhtDetail($id)
    {
        $nhttinTuc = nht_TIN_TUC::findOrFail($id);
        return view('nhtAdmins.nhttintuc.nht-detail', ['nhttinTuc' => $nhttinTuc]);
    }

    // Show the create form for a new news item ----------------------------------------
    public function nhtCreate()
    {
        return view('nhtAdmins.nhttintuc.nht-create');
    }

    // Handle the form submission for creating a new news item ---------------------------
    public function nhtCreateSubmit(Request $request)
    {
        // Validate the input data
        $validatedData = $request->validate([
            'nhtMaTT' => 'required|unique:nht_TIN_TUC,nhtMaTT',
            'nhtTieuDe' => 'required|string|max:255',
            'nhtMoTa' => 'required|string',
            'nhtNoiDung' => 'required|string',
            'nhtNgayDangTin' => 'required|date',
            'nhtNgayCapNhap' => 'required|date',
            'nhtHinhAnh' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:10240', // Optional image
            'nhtTrangThai' => 'required|in:0,1',  // 0 - inactive, 1 - active
        ]);

        // Create the new news item
        $nhttinTuc = new nht_TIN_TUC();
        $nhttinTuc->nhtMaTT = $request->nhtMaTT;
        $nhttinTuc->nhtTieuDe = $request->nhtTieuDe;
        $nhttinTuc->nhtMoTa = $request->nhtMoTa;
        $nhttinTuc->nhtNoiDung = $request->nhtNoiDung;
        $nhttinTuc->nhtNgayDangTin = $request->nhtNgayDangTin;
        $nhttinTuc->nhtNgayCapNhap = $request->nhtNgayCapNhap;

        // Check if there's an image and save it
        if ($request->hasFile('nhtHinhAnh')) {
            $imagePath = $request->file('nhtHinhAnh')->store('public/img/tin_tuc');
            $nhttinTuc->nhtHinhAnh = 'img/tin_tuc/' . basename($imagePath);
        }

        $nhttinTuc->nhtTrangThai = $request->nhtTrangThai;
        $nhttinTuc->save();

        return redirect()->route('nhtadmins.nhttintuc')->with('success', 'Tin tức đã được tạo thành công.');
    }

    // Delete a news item ----------------------------------------------------------------
    public function nhtDelete($id)
    {
        $nhttinTuc = nht_TIN_TUC::findOrFail($id);
        $nhttinTuc->delete();

        return back()->with('success', 'Tin tức đã được xóa thành công.');
    }

    // Show the edit form for a specific news item --------------------------------------
    public function nhtEdit($id)
    {
        $nhttinTuc = nht_TIN_TUC::findOrFail($id);
        return view('nhtAdmins.nhttintuc.nht-edit', ['nhttinTuc' => $nhttinTuc]);
    }

    // Handle the form submission for updating an existing news item ---------------------
    public function nhtEditSubmit(Request $request, $id)
{
    $validated = $request->validate([
        'nhtTieuDe' => 'required|string|max:255',
        'nhtMoTa' => 'required|string|max:500',
        'nhtNoiDung' => 'required|string',
        'nhtHinhAnh' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'nhtNgayDangTin' => 'required|date',
        'nhtNgayCapNhap' => 'nullable|date',
        'nhtTrangThai' => 'required|in:0,1',
    ]);

    // Retrieve the news article to update
    $nhttinTuc = nht_TIN_TUC::findOrFail($id);

    // Handle image upload
    if ($request->hasFile('nhtHinhAnh')) {
        // Delete old image if exists
        if ($nhttinTuc->nhtHinhAnh) {
            Storage::delete('public/' . $nhttinTuc->nhtHinhAnh);
        }

        $imagePath = $request->file('nhtHinhAnh')->store('nhttinTuc', 'public');
        $nhttinTuc->nhtHinhAnh = $imagePath;
    }

    // Update the news article
    $nhttinTuc->nhtTieuDe = $request->nhtTieuDe;
    $nhttinTuc->nhtMoTa = $request->nhtMoTa;
    $nhttinTuc->nhtNoiDung = $request->nhtNoiDung;
    $nhttinTuc->nhtNgayDangTin = $request->nhtNgayDangTin;
    $nhttinTuc->nhtNgayCapNhap = $request->nhtNgayCapNhap ?? now();
    $nhttinTuc->nhtTrangThai = $request->nhtTrangThai;
    $nhttinTuc->save();

    return redirect()->route('nhtadmins.nhttintuc')->with('success', 'Tin tức đã được cập nhật!');
}

}