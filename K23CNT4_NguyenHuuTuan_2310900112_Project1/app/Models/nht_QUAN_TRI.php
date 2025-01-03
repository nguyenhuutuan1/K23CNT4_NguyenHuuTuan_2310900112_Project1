<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class nht_QUAN_TRI extends Model
{
    use HasFactory;

    protected $table = 'nht_QUAN_TRI';

    protected $fillable = ['nhtTaiKhoan', 'nhtMatKhau', 'nhtTrangThai'];

    public $timestamps = false;
}