<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class nht_CT_HOA_DON extends Model
{
    use HasFactory;

    protected $table = 'nht_CT_HOA_DON';  

    protected $primaryKey = 'id'; 
    public $timestamps = true;  

    protected $fillable = [
       'nhtHoaDonID',  
        'nhtSanPhamID',
        'nhtSoLuongMua',
        'nhtDonGiaMua',
        'nhtThanhTien',
        'nhtTrangThai',
    ];

public function hoaDon()
{
    return $this->belongsTo(nht_HOA_DON::class, 'nhtHoaDonID', 'id');
}

public function sanPham()
{
    return $this->belongsTo(nht_SAN_PHAM::class, 'nhtSanPhamID', 'id');
}

}