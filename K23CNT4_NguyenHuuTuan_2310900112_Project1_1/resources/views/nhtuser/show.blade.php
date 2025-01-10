
@extends('_layouts.frontend.user')

@section('title', 'Chi Tiết Sản Phẩm')

@section('content-body')
    <div class="container mx-auto py-5">
        <div class="text-center mb-5">
            <h1 class="text-3xl font-bold text-blue-600 mb-3">{{ $sanPham->nhtTenSanPham }}</h1>
            
            <img src="{{ asset('storage/' . $sanPham->nhtHinhAnh) }}" class="mx-auto my-4 rounded-lg shadow-lg" alt="{{ $sanPham->nhtTenSanPham }}" style="max-width: 80%; height: auto;">
            
            <p class="mt-3 text-xl text-green-600"><strong>Giá: </strong>{{ number_format($sanPham->nhtDonGia, 0, ',', '.') }} VND</p>
            
            <p class="mt-3 text-lg text-gray-700"><strong>Mô Tả: </strong>{{ $sanPham->nhtMoTa }}</p>
            
            <p class="mt-2 text-lg text-yellow-600"><strong>Số Lượng: </strong>{{ $sanPham->nhtSoLuong }} sản phẩm còn lại</p>
        </div>

        <div class="text-center mt-8">
            <a href="{{ url()->previous() }}" class="bg-gray-500 text-white py-2 px-4 rounded-lg hover:bg-gray-600 transition duration-300" style="font-size: 1.1rem;">Quay Lại</a>
        </div>
    </div>
@endsection