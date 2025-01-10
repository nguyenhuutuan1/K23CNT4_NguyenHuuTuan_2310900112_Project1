<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class nht_HOA_DON extends Model
{
    use HasFactory;

    // Đặt tên bảng nếu khác mặc định
    protected $table = 'nht_HOA_DON';  // Tên bảng trong cơ sở dữ liệu

    protected $primaryKey = 'id';  // Xác định khóa chính của bảng (mặc định là 'id')

    public $timestamps = true;  // Laravel tự động quản lý các cột created_at và updated_at

    // Các trường có thể được gán hàng loạt
    protected $fillable = [
        'nhtMaHoaDon',  // Thêm trường nhtMaHoaDon vào mảng fillable
        'nhtMaKhachHang',
        'nhtNgayHoaDon',
        'nhtNgayNhan',
        'nhtHoTenKhachHang',
        'nhtEmail',
        'nhtDienThoai',
        'nhtDiaChi',
        'nhtTongGiaTri',
        'nhtTrangThai',
    ];

    // Quan hệ với bảng nht_KHACH_HANG
    public function khachHang()
    {
        return $this->belongsTo(nht_KHACH_HANG::class, 'nhtMaKhachHang', 'id');
    }

    // Quan hệ với bảng nht_CT_HOA_DON
    public function chiTietHoaDon()
    {
        return $this->hasMany(nht_CT_HOA_DON::class, 'nhtHoaDonID', 'id');
    }
    
}