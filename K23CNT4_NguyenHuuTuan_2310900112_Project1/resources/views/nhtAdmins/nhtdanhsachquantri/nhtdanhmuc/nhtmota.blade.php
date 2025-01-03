@extends('_layouts.admins._master')

@section('title', 'Mô Tả Sản Phẩm')

@section('content-body')
    <div class="container-fluid mt-5">
        <h1 class="text-center text-primary mb-4" style="font-family: 'Roboto', sans-serif;">Mô Tả Sản Phẩm</h1>

        <div class="row">
            <div class="col-12">
                <div style="margin-bottom: 30px;">
                    <div style="width: 50%; height: auto; margin-bottom: 20px; margin-left: auto; margin-right: auto;">
                        <img src="{{ asset('storage/' . $product->nhtHinhAnh) }}" class="img-fluid" alt="Sản phẩm {{ $product->nhtMaSanPham }}" style="width: 100%; height: auto; object-fit: cover; border-radius: 8px;">
                    </div>
                    <div style="text-align: center; margin-top: 10px;">
                        <h3 style="font-size: 2rem; color: #2c3e50; font-weight: bold; line-height: 1.4;">
                            {{ $product->nhtTenSanPham }}
                        </h3>
                    </div>

                    <div class="d-flex flex-column" style="padding: 20px;">
                        <p style="font-size: 1.2rem; color: #555; line-height: 1.6; margin-bottom: 15px;">
                            <strong class="text-dark">Giới thiệu:</strong>
                            <span>{{ $product->nhtGioiThieu }}</span>
                        </p>

                        <p style="font-size: 1.2rem; color: #555; line-height: 1.6; margin-bottom: 15px;">
                            <strong class="text-dark">Mô tả:</strong>
                            <span>{{ $product->nhtMoTa }}</span>
                        </p>

                        <p style="font-size: 1.2rem; color: red; line-height: 1.6; font-weight: bold;">
                            <strong class="text-dark">Giá:</strong> {{ number_format($product->nhtDonGia, 0, ',', '.') }} VND
                        </p>
                    </div>
                </div>

                <a href="{{ route('nhtAdmins.nhtdanhsachquantri.danhmuc.sanpham') }}" class="btn btn-secondary mt-3">Quay lại</a>
            </div>
        </div>
    </div>
@endsection