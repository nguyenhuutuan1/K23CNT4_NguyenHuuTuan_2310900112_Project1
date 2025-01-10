@extends('_layouts.frontend.user1')

@section('title', 'Tạo Chi Tiết Hóa Đơn')

@section('content-body')
<div class="container">
    <h1>Tạo Chi Tiết Hóa Đơn</h1>

    <form action="{{ route('cthoadon.storecthoadon') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="nhtHoaDonID">Hóa Đơn ID</label>
            <input type="number" name="nhtHoaDonID" value="{{ $hoaDon->id }}" class="form-control" readonly>
        </div>

        <div class="form-group">
            <label for="nhtSanPhamID">Sản Phẩm ID</label>
            <input type="number" name="nhtSanPhamID" value="{{ $sanPham->id }}" class="form-control" readonly>
        </div>

        <div class="form-group">
            <label for="nhtSoLuong">Số Lượng</label>
            <input type="number" name="nhtSoLuong" id="nhtSoLuong" value="{{ $soLuong }}" min="1" max="{{ $sanPham->nhtSoLuong }}" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="nhtDonGiaMua">Đơn Giá</label>
            <input type="text" class="form-control" value="{{ number_format($sanPham->nhtDonGia, 0, ',', '.') }} VND" disabled>
        </div>

        <div class="form-group">
            <label for="nhtThanhTien">Thành Tiền</label>
            <input type="text" class="form-control" id="nhtThanhTien" value="{{ number_format($sanPham->nhtDonGia * $soLuong, 0, ',', '.') }} VND" disabled>
        </div>

        <button type="submit" class="btn btn-primary">Lưu Chi Tiết Hóa Đơn</button>
    </form>
</div>

@section('scripts')
<script>
    document.getElementById('nhtSoLuong').addEventListener('input', function() {
        var soLuong = parseInt(this.value); 
        var donGia = {{ $sanPham->nhtDonGia }}; 

        if (isNaN(soLuong) || soLuong < 1) {
            soLuong = 1;
            this.value = soLuong;  
        }

        var thanhTien = soLuong * donGia;

        document.getElementById('nhtThanhTien').value = new Intl.NumberFormat().format(thanhTien) + ' VND';
    });
</script>
@endsection

@endsection