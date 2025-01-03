<?php

namespace App\Http\Controllers;

use App\Models\nht_SAN_PHAM;
use App\Models\nht_HOA_DON;
use App\Models\nht_CT_HOA_DON;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $sanPhams = nht_SAN_PHAM::paginate(6);  
    
        return view('nhtuser.home', compact('sanPhams'));
    }
    
    public function index1()
    {
        $sanPhams = nht_SAN_PHAM::paginate(6); 
        
        return view('nhtuser.home1', compact('sanPhams'));
    }
    public function show($id)
    {
        $sanPham = nht_SAN_PHAM::findOrFail($id); 
        return view('nhtuser.show', compact('sanPham')); 
    }






 


}   