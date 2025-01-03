<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NHT_LOAI_SAN_PHAMController;
use App\Http\Controllers\NHT_SAN_PHAMController;
use App\Http\Controllers\NHT_KHACH_HANGcontroller;
use App\Http\Controllers\NHT_DANH_SACH_QUAN_TRIController;
use App\Http\Controllers\NHT_HOA_DONController;
use App\Http\Controllers\NHT_CT_HOA_DONController;
use App\Http\Controllers\NHT_TIN_TUCController;
use App\Http\Controllers\NHT_LOGIN_USERController;
use App\Http\Controllers\NHT_SIGNUPController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


// admins login --------------------------------------------------------------------------------------------------------------------------------------
use App\Http\Controllers\NHT_QUAN_TRIController;
Route::get('/', [NHT_QUAN_TRIController::class, 'nhtLogin'])->name('admins.NHTLogin');
Route::post('/', [NHT_QUAN_TRIController::class, 'NHTLoginSubmit'])->name('admins.NHTLoginSubmit');


#admins - route--------------------------------------------------------------------------------------------------------------------------------------
route::get('/NHT-admins',function(){
    return view('NHTAdmins.index');
});
#admins - danh muc--------------------------------------------------------------------------------------------------------------------------------------
Route::get('/NHT-admins/NHTdanhsachquantri/NHTdanhmuc', [NHT_DANH_SACH_QUAN_TRIController::class, 'danhmuc'])->name('NHTAdmins.NHTdanhsachquantri.danhmuc');
#admins - tin tức --------------------------------------------------------------------------------------------------------------------------------------
Route::get('/NHT-admins/NHTdanhsachquantri/NHTtintuc', [NHT_DANH_SACH_QUAN_TRIController::class, 'tintuc'])->name('NHTAdmins.NHTdanhsachquantri..danhmuc.tintuc');
// Sản phẩm--------------------------------------------------------------------------------------------------------------------------------------
Route::get('/NHT-admins/NHTdanhsachquantri/NHTsanpham', [NHT_DANH_SACH_QUAN_TRIController::class, 'sanpham'])->name('NHTAdmins.NHTdanhsachquantri.danhmuc.sanpham');
// Mô tả sản phẩm--------------------------------------------------------------------------------------------------------------------------------------
Route::get('/NHT-admins/NHTdanhsachquantri/NHTmota/{id}', [NHT_DANH_SACH_QUAN_TRIController::class, 'mota'])->name('NHTAdmins.NHTdanhsachquantri.danhmuc.mota');
#admins - nguoidung--------------------------------------------------------------------------------------------------------------------------------------
Route::get('/NHT-admins/NHTdanhsachquantri/NHTnguoidung', [NHT_DANH_SACH_QUAN_TRIController::class, 'nguoidung'])->name('NHTAdmins.NHTdanhsachquantri.nguoidung');

// loai san pham--------------------------------------------------------------------------------------------------------------------------------------
// list
Route::get('/NHT-admins/NHT-loai-san-pham',[NHT_LOAI_SAN_PHAMController::class,'NHTList'])->name('NHTadmins.NHTloaisanpham');
//create
Route::get('/NHT-admins/NHT-loai-san-pham/NHT-create',[NHT_LOAI_SAN_PHAMController::class,'NHTCreate'])->name('NHTadmin.NHTloaisanpham.NHTcreate');
Route::post('/NHT-admins/NHT-loai-san-pham/NHT-create',[NHT_LOAI_SAN_PHAMController::class,'NHTCreateSunmit'])->name('NHTadmin.NHTloaisanpham.NHTCreateSunmit');
// edit
Route::get('/NHT-admins/NHT-loai-san-pham/NHT-edit/{id}',[NHT_LOAI_SAN_PHAMController::class,'NHTEdit'])->name('NHTadmin.NHTloaisanpham.NHTEdit');
Route::post('/NHT-admins/NHT-loai-san-pham/NHT-edit',[NHT_LOAI_SAN_PHAMController::class,'NHTEditSubmit'])->name('NHTadmin.NHTloaisanpham.NHTEditSubmit');
// detail
Route::get('/NHT-admins/NHT-loai-san-pham/NHT-detail/{id}',[NHT_LOAI_SAN_PHAMController::class,'NHTGetDetail'])->name('NHTadmin.NHTloaisanpham.NHTGetDetail');
// delete
Route::get('/NHT-admins/NHT-loai-san-pham/NHT-delete/{id}',[NHT_LOAI_SAN_PHAMController::class,'NHTDelete'])->name('NHTadmin.NHTloaisanpham.NHTDelete');

// san pham--------------------------------------------------------------------------------------------------------------------------------------
// search
Route::get('/NHT-admins/NHT-san-pham/search', [NHT_SAN_PHAMController::class, 'searchAdmins'])->name('NHTuser.searchAdmins');
// list

Route::get('/NHT-admins/NHT-san-pham',[NHT_SAN_PHAMController::class,'NHTList'])->name('NHTadims.NHTsanpham');
//create
Route::get('/NHT-admins/NHT-san-pham/NHT-create',[NHT_SAN_PHAMController::class,'NHTCreate'])->name('NHTadmin.NHTsanpham.NHTcreate');
Route::post('/NHT-admins/NHT-san-pham/NHT-create',[NHT_SAN_PHAMController::class,'NHTCreateSubmit'])->name('NHTadmin.NHTsanpham.NHTCreateSubmit');
//detail
Route::get('/NHT-admins/NHT-san-pham/NHT-detail/{id}', [NHT_SAN_PHAMController::class, 'NHTDetail'])->name('NHTadmin.NHTsanpham.NHTDetail');
// edit
Route::get('/NHT-admins/NHT-san-pham/NHT-edit/{id}', [NHT_SAN_PHAMController::class, 'NHTEdit'])->name('NHTadmin.NHTsanpham.NHTedit');

// Xử lý cập nhật sản phẩm
Route::post('/NHT-admins/NHT-san-pham/NHT-edit/{id}', [NHT_SAN_PHAMController::class, 'NHTEditSubmit'])->name('NHTadmin.NHTsanpham.NHTEditSubmit');
//delete
// Đảm bảo sử dụng phương thức POST để gọi route xóa sản phẩm
Route::get('/NHT-admins/NHT-san-pham/NHT-delete/{id}', [NHT_SAN_PHAMController::class, 'NHTdelete'])->name('NHTadmin.NHTsanpham.NHTdelete');


// khach hang--------------------------------------------------------------------------------------------------------------------------------------
// list
Route::get('/NHT-admins/NHT-khach-hang',[NHT_KHACH_HANGcontroller::class,'NHTList'])->name('NHTadmins.NHTkhachhang');
//detail
Route::get('/NHT-admins/NHT-khach-hang/NHT-detail/{id}', [NHT_KHACH_HANGcontroller::class, 'NHTDetail'])->name('NHTadmin.NHTkhachhang.NHTDetail');
//create
Route::get('/NHT-admins/NHT-khach-hang/NHT-create',[NHT_KHACH_HANGcontroller::class,'NHTCreate'])->name('NHTadmin.NHTkhachhang.NHTcreate');
Route::post('/NHT-admins/NHT-khach-hang/NHT-create',[NHT_KHACH_HANGcontroller::class,'NHTCreateSubmit'])->name('NHTadmin.NHTkhachhang.NHTCreateSubmit');
//edit
Route::get('/NHT-admins/NHT-khach-hang/NHT-edit/{id}', [NHT_KHACH_HANGcontroller::class, 'NHTEdit'])->name('NHTadmin.NHTkhachhang.NHTedit');
Route::post('/NHT-admins/NHT-khach-hang/NHT-edit/{id}', [NHT_KHACH_HANGcontroller::class, 'NHTEditSubmit'])->name('NHTadmin.NHTkhachhang.NHTEditSubmit');
//delete
// Đảm bảo sử dụng phương thức POST để gọi route xóa sản phẩm
Route::get('/NHT-admins/NHT-khach-hang/NHT-delete/{id}', [NHT_KHACH_HANGcontroller::class, 'NHTDelete'])->name('NHTadmin.NHTkhachhang.NHTdelete');

// Hóa Đơn--------------------------------------------------------------------------------------------------------------------------------------
// list
Route::get('/NHT-admins/NHT-hoa-don',[NHT_HOA_DONController::class,'NHTList'])->name('NHTadmins.NHThoadon');
//detail
Route::get('/NHT-admins/NHT-hoa-don/NHT-detail/{id}', [NHT_HOA_DONController::class, 'NHTDetail'])->name('NHTadmin.NHThoadon.NHTDetail');
//create
Route::get('/NHT-admins/NHT-hoa-don/NHT-create',[NHT_HOA_DONController::class,'NHTCreate'])->name('NHTadmin.NHThoadon.NHTcreate');
Route::post('/NHT-admins/NHT-hoa-don/NHT-create',[NHT_HOA_DONController::class,'NHTCreateSubmit'])->name('NHTadmin.NHThoadon.NHTCreateSubmit');
//edit
Route::get('/NHT-admins/NHT-hoa-don/NHT-edit/{id}', [NHT_HOA_DONController::class, 'NHTEdit'])->name('NHTadmin.NHThoadon.NHTedit');
Route::post('/NHT-admins/NHT-hoa-don/NHT-edit/{id}', [NHT_HOA_DONController::class, 'NHTEditSubmit'])->name('NHTadmin.NHThoadon.NHTEditSubmit');
//delete
// Đảm bảo sử dụng phương thức POST để gọi route xóa sản phẩm
Route::get('/NHT-admins/NHT-hoa-don/NHT-delete/{id}', [NHT_HOA_DONController::class, 'NHTDelete'])->name('NHTadmin.NHThoadon.NHTdelete');


// Chi Tiết Hóa Đơn--------------------------------------------------------------------------------------------------------------------------------------
// list
Route::get('/NHT-admins/NHT-ct-hoa-don',[NHT_CT_HOA_DONController::class,'NHTList'])->name('NHTadmins.NHTcthoadon');
//detail
Route::get('/NHT-admins/NHT-ct-hoa-don/NHT-detail/{id}', [NHT_CT_HOA_DONController::class, 'NHTDetail'])->name('NHTadmin.NHTcthoadon.NHTDetail');
//create
Route::get('/NHT-admins/NHT-ct-hoa-don/NHT-create',[NHT_CT_HOA_DONController::class,'NHTCreate'])->name('NHTadmin.NHTcthoadon.NHTcreate');
Route::post('/NHT-admins/NHT-ct-hoa-don/NHT-create',[NHT_CT_HOA_DONController::class,'NHTCreateSubmit'])->name('NHTadmin.NHTcthoadon.NHTCreateSubmit');
//edit
Route::get('/NHT-admins/NHT-ct-hoa-don/NHT-edit/{id}', [NHT_CT_HOA_DONController::class, 'NHTEdit'])->name('NHTadmin.NHTcthoadon.NHTedit');
Route::post('/NHT-admins/NHT-ct-hoa-don/NHT-edit/{id}', [NHT_CT_HOA_DONController::class, 'NHTEditSubmit'])->name('NHTadmin.NHTcthoadon.NHTEditSubmit');
//delete
// Đảm bảo sử dụng phương thức POST để gọi route xóa sản phẩm
Route::get('/NHT-admins/NHT-ct-hoa-don/NHT-delete/{id}', [NHT_CT_HOA_DONController::class, 'NHTDelete'])->name('NHTadmin.NHTcthoadon.NHTdelete');


// Quản trị Viên--------------------------------------------------------------------------------------------------------------------------------------
// list
Route::get('/NHT-admins/NHT-quan-tri',[NHT_QUAN_TRIController::class,'NHTList'])->name('NHTadmins.NHTquantri');
//detail
Route::get('/NHT-admins/NHT-quan-tri/NHT-detail/{id}', [NHT_QUAN_TRIController::class, 'NHTDetail'])->name('NHTadmin.NHTquantri.NHTDetail');
//create
Route::get('/NHT-admins/NHT-quan-tri/NHT-create',[NHT_QUAN_TRIController::class,'NHTCreate'])->name('NHTadmin.NHTquantri.NHTcreate');
Route::post('/NHT-admins/NHT-quan-tri/NHT-create',[NHT_QUAN_TRIController::class,'NHTCreateSubmit'])->name('NHTadmin.NHTquantri.NHTCreateSubmit');
//edit
Route::get('/NHT-admins/NHT-quan-tri/NHT-edit/{id}', [NHT_QUAN_TRIController::class, 'NHTEdit'])->name('NHTadmin.NHTquantri.NHTedit');
Route::post('/NHT-admins/NHT-quan-tri/NHT-edit/{id}', [NHT_QUAN_TRIController::class, 'NHTEditSubmit'])->name('NHTadmin.NHTquantri.NHTEditSubmit');
//delete
// Đảm bảo sử dụng phương thức POST để gọi route xóa sản phẩm
Route::get('/NHT-admins/NHT-quan-tri/NHT-delete/{id}', [NHT_QUAN_TRIController::class, 'NHTDelete'])->name('NHTadmin.NHTquantri.NHTdelete');

use App\Http\Controllers\HomeController;

// User - Routes
Route::get('/NHT-user', [HomeController::class, 'index'])->name('NHTuser.home');
Route::get('/NHT-user1', [HomeController::class, 'index1'])->name('NHTuser.home1');
// Hiển thị chi tiết sản phẩm
Route::get('/NHT-user/show/{id}', [HomeController::class, 'show'])->name('NHTuser.show');
// search
Route::get('/search', [NHT_SAN_PHAMController::class, 'search'])->name('NHTuser.search');
Route::get('/search1', [NHT_SAN_PHAMController::class, 'search1'])->name('NHTuser.search1');

Route::get('/NHTuser/login', [NHT_LOGIN_USERController::class, 'NHTLogin'])->name('NHTuser.login');
Route::post('/NHTuser/login', [NHT_LOGIN_USERController::class, 'NHTLoginSubmit'])->name('NHTuser.NHTLoginSubmit');
Route::get('/NHTuser/logout', [NHT_LOGIN_USERController::class, 'NHTLogout'])->name('NHTuser.logout');


// hỗ trợ 
route::get('/NHT-user/support',function()
{
    return view('NHTuser.support');
});

// signup
Route::get('/NHT-user/signup', [NHT_SIGNUPController::class, 'NHTsignup'])->name('NHTuser.NHTsignup');
Route::post('/NHT-user/signup', [NHT_SIGNUPController::class, 'NHTsignupSubmit'])->name('NHTuser.NHTsignupSubmit');



// Route để hiển thị sản phẩm trong trang thanh toán
Route::get('/NHT-user/thaNHToan/{product_id}', [NHT_CT_HOA_DONController::class, 'NHTthaNHToan'])->name('NHTuser.NHTthaNHToan');

// Route để xử lý thanh toán
Route::post('/NHT-user/thaNHToan', [NHT_CT_HOA_DONController::class, 'storeThaNHToan'])->name('NHTuser.storeThaNHToan');
// create hóa đơn user


// tạo bảng hóa đơn
Route::get('san-pham/{sanPham}', [NHT_CT_HOA_DONController::class, 'show'])->name('sanpham.show');
Route::post('mua-san-pham/{sanPham}', [NHT_CT_HOA_DONController::class, 'store'])->name('hoadon.store');

// xem bảng Hóa Đơn mới Tạo
Route::get('hoa-don/{hoaDonId}/san-pham/{sanPhamId}', [NHT_HOA_DONController::class, 'show'])->name('hoadon.show');



// tạo bảng chi tiết hóa đơn


// Route để tạo mới chi tiết hóa đơn
Route::get('/cthoadon/{hoaDonId}/{sanPhamId}', [NHT_CT_HOA_DONController::class, 'create'])->name('cthoadon.create');

// Route để lưu chi tiết hóa đơn
Route::post('/cthoadon/store', [NHT_CT_HOA_DONController::class, 'storecthoadon'])->name('cthoadon.storecthoadon');

// Route để hiển thị chi tiết hóa đơn
Route::get('/hoa-don-id/{hoaDonId}/san-pham-id/{sanPhamId}', [NHT_CT_HOA_DONController::class, 'cthoadonshow'])->name('cthoadon.cthoadonshow');


// giỏ hàng