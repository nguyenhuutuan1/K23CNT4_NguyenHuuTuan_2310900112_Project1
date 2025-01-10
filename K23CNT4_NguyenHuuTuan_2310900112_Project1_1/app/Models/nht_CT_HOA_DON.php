<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class nht_CT_HOA_DON extends Model
{
    use HasFactory;

    // Đặt tên bảng nếu khác mặc định
    protected $table = 'nht_CT_HOA_DON';  // Tên bảng trong cơ sở dữ liệu

    protected $primaryKey = 'id';  // Xác định khóa chính của bảng (mặc định là 'id')

    public $timestamps = true;  // Laravel tự động quản lý các cột created_at và updated_at

    // Các trường có thể được gán hàng loạt
    protected $fillable = [
       'nhtHoaDonID',   // Đảm bảo có trường nhtHoaDonID ở đây
        'nhtSanPhamID',
        'nhtSoLuongMua',
        'nhtDonGiaMua',
        'nhtThanhTien',
        'nhtTrangThai',
    ];

    // Quan hệ giữa bảng nht_CT_HOA_DON và bảng nht_SAN_PHAM
 // Quan hệ với bảng nht_HOA_DON
public function hoaDon()
{
    return $this->belongsTo(nht_HOA_DON::class, 'nhtHoaDonID', 'id');
}

// Quan hệ với bảng nht_SAN_PHAM
public function sanPham()
{
    return $this->belongsTo(nht_SAN_PHAM::class, 'nhtSanPhamID', 'id');
}

}