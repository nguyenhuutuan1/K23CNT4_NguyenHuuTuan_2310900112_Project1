<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class nht_TIN_TUC extends Model
{
    use HasFactory;
    
    protected $table = 'nht_TIN_TUC';
    protected $primaryKey = 'id';
    public $incrementing = false; // Nếu nhtnhacc không phải là auto-increment
    public $timestamps = true; // Đảm bảo là 'true' nếu bạn sử dụng timestamps
}