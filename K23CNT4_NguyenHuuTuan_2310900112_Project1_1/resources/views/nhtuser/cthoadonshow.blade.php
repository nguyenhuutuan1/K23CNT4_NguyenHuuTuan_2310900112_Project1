@extends('_layouts.frontend.user1')  

@section('title', 'Thông Tin Chi Tiết Hóa Đơn')

@section('content-body')
<div class="container">
    <h1>Thông Tin Chi Tiết Hóa Đơn</h1>

    <div class="card">
        <div class="card-header">
        </div>
        <div class="card-body">
            <p><strong>Hóa Đơn ID:</strong> {{ $chiTietHoaDon->nhtHoaDonID ?? 'Không có thông tin' }}</p>
            <p><strong>Sản Phẩm ID:</strong> {{ $chiTietHoaDon->nhtSanPhamID ?? 'Không có thông tin' }}</p>
            <p><strong>Số Lượng Mua:</strong> {{ $hoaDon->chiTietHoaDon->first()->nhtSoLuongMua ?? 'Không có thông tin' }}</p>
            <p><strong>Đơn Giá Mua:</strong> {{ number_format($hoaDon->chiTietHoaDon->first()->nhtDonGiaMua ?? 0, 0, ',', '.') }} VND</p>
            <p><strong>Thành Tiền:</strong> {{ number_format($hoaDon->chiTietHoaDon->first()->nhtThanhTien ?? 0, 0, ',', '.') }} VND</p>
            <p><strong>Trạng Thái:</strong> 
                @if ($hoaDon->nhtTrangThai == 0)
                    Chưa Thanh Toán
                @elseif ($hoaDon->nhtTrangThai == 1)
                    Đã Thanh Toán
                @else
                    Không xác định
                @endif
            </p>
        </div>
    </div>
</div>

@endsection