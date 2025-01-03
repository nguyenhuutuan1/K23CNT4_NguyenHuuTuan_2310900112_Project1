<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class nht_SAN_PHAM extends Model
{
    use HasFactory;
   
    protected $table = 'nht_SAN_PHAM';
    protected $primaryKey = 'id';
    public $timestamps = true;

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