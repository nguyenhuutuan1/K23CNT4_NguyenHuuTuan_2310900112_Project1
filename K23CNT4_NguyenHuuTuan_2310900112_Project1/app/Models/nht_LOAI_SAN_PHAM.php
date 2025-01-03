<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class nht_LOAI_SAN_PHAM extends Model
{
    use HasFactory;
    protected $table = 'nht_LOAI_SAN_PHAM';
    protected $primaryKey = 'id';
    public $incrementing = false; 
    public $timestamps = true; 
}