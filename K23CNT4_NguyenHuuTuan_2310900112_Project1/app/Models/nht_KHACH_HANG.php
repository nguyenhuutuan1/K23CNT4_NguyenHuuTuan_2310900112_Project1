<?php
namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable; 
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Hash;

class nht_KHACH_HANG extends Authenticatable 
{
    use HasFactory;


    protected $table = 'nht_KHACH_HANG';
    protected $primaryKey = 'nhtMaKhachHang'; 

    protected $fillable = [
        'nhtMaKhachHang', 'nhtHoTenKhachHang', 'nhtEmail', 'nhtMatKhau', 
        'nhtDienThoai', 'nhtDiaChi', 'nhtNgayDangKy', 'nhtTrangThai'
    ];

    public $incrementing = false; 
    public $timestamps = true;

    protected $dates = ['nhtNgayDangKy'];

    public function setnhtMatKhauAttribute($value)
{
    if (!empty($value)) {
        $this->attributes['nhtMatKhau'] = Hash::make($value);
    }
}

    
}