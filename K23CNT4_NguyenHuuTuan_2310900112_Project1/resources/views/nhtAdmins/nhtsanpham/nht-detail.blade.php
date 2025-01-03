@extends('_layouts.admins._master')

@section('title', 'Chi Tiết Sản Phẩm')

@section('content-body')
<div class="container border mt-4">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h1>Chi Tiết Sản Phẩm</h1>
                </div>
                <div class="card-body">
                    <p class="card-text">
                        <b>Mã sản phẩm:</b> {{ $nhtsanpham->nhtMaSanPham }}
                    </p>

                    <p class="card-text">
                        <b>Tên sản phẩm:</b> {{ $nhtsanpham->nhtTenSanPham }}
                    </p>

                    <p class="card-text">
                        <b>Hình Ảnh:</b><br>
                        <img src="{{ asset('storage/' . $nhtsanpham->nhtHinhAnh) }}" alt="Sản phẩm {{ $nhtsanpham->nhtMaSanPham }}" width="200" class="img-fluid">
                    </p>

                    <p class="card-text">
                        <b>Số Lượng:</b> {{ $nhtsanpham->nhtSoLuong }}
                    </p>

                    <p class="card-text">
                        <b>Đơn Giá:</b> {{ number_format($nhtsanpham->nhtDonGia, 0, ',', '.') }} VND
                    </p>

                    <p class="card-text">
                        <b>Mã Loại:</b> {{ $nhtsanpham->nhtMaLoai }}
                    </p>

                    <p class="card-text">
                        <b>Trạng Thái:</b>
                        @if($nhtsanpham->nhtTrangThai == 0)
                            <span class="badge bg-success">Hiển Thị</span>
                        @else
                            <span class="badge bg-danger">Khóa</span>
                        @endif
                    </p>
                </div>
                <div class="card-footer">
                    <a href="{{ route('nhtadims.nhtsanpham') }}" class="btn btn-primary">Quay lại danh sách</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection