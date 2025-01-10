<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class nht_SAN_PHAM extends Model
{
    use HasFactory;

    // Tên bảng trong cơ sở dữ liệu
   
    protected $table = 'nht_SAN_PHAM';
    protected $primaryKey = 'id';
    public $timestamps = true;

    
    // Các trường có thể được gán hàng loạt
    protected $fillable = [
        'nhtMaSanPham',
        'nhtTenSanPham',
        'nhtHinhAnh',
        'nhtSoLuong',
        'nhtDonGia',
        'nhtMaLoai',
        'nhtMoTa',
        'nhtTrangThai',
    ];
    public function chiTietHoaDon()
    {
        return $this->hasMany(nht_CT_HOA_DON::class, 'nhtSanPhamID','id');
    }
   

}