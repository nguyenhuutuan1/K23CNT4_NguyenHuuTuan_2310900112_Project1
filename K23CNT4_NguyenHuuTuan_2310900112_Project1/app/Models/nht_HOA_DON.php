<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class nht_HOA_DON extends Model
{
    use HasFactory;

    protected $table = 'nht_HOA_DON';

    protected $primaryKey = 'id'; 

    public $timestamps = true;  

    protected $fillable = [
        'nhtMaHoaDon',  
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

    public function khachHang()
    {
        return $this->belongsTo(nht_KHACH_HANG::class, 'nhtMaKhachHang', 'id');
    }

    public function chiTietHoaDon()
    {
        return $this->hasMany(nht_CT_HOA_DON::class, 'nhtHoaDonID', 'id');
    }
    
}