@extends('_layouts.admins._master')
@section('title','Create chi tiết Hóa Đơn')
    
@section('content-body')
    <div class="container border">
        <div class="row">
            <div class="col">
                <form action="{{ route('nhtadmin.nhtcthoadon.nhtCreateSubmit') }}" method="POST">
                    @csrf
                    <div class="card">
                        <div class="card-header">
                            <h1>Thêm Mới chi tiết Hóa Đơn</h1>
                        </div>

                        <div class="mb-3">
                            <label for="nhtHoaDonID" class="form-label">Mã Hóa Đơn</label>
                            <select name="nhtHoaDonID" id="nhtHoaDonID" class="form-control">
                                @foreach ($nhthoadon as $item)
                                    <option value="{{ $item->id }}">{{ $item->nhtMaHoaDon }}</option>
                                @endforeach
                            </select>
                            @error('nhtHoaDonID')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="nhtSanPhamID" class="form-label">Mã Sản Phẩm</label>
                            <select name="nhtSanPhamID" id="nhtSanPhamID" class="form-control">
                                @foreach ($nhtsanpham as $item)
                                    <option value="{{ $item->id }}" data-price="{{ $item->nhtDonGia }}">{{ $item->nhtMaSanPham }}</option>
                                @endforeach
                            </select>
                            @error('nhtSanPhamID')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="nhtSoLuongMua" class="form-label">Số Lượng Mua</label>
                            <input type="number" class="form-control" id="nhtSoLuongMua" name="nhtSoLuongMua" value="{{ old('nhtSoLuongMua') }}" min="1" oninput="calculateThanhTien()">
                            @error('nhtSoLuongMua')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="nhtDonGiaMua" class="form-label">Đơn Giá Mua</label>
                            <input type="number" class="form-control" id="nhtDonGiaMua" name="nhtDonGiaMua" value="{{ old('nhtDonGiaMua') }}" oninput="calculateThanhTien()">
                            @error('nhtDonGiaMua')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="nhtThanhTien" class="form-label">Thành Tiền</label>
                            <input type="number" class="form-control" id="nhtThanhTien" name="nhtThanhTien" value="{{ old('nhtThanhTien') }}" readonly>
                            @error('nhtThanhTien')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="nhtTrangThai" class="form-label">Trạng Thái</label>
                            <div class="col-sm-10">
                                <input type="radio" id="nhtTrangThai0" name="nhtTrangThai" value="0" checked />
                                <label for="nhtTrangThai0">Hoàn Thành</label>
                                &nbsp;
                                <input type="radio" id="nhtTrangThai1" name="nhtTrangThai" value="1" />
                                <label for="nhtTrangThai1">Trả Lại</label>
                                &nbsp;
                                <input type="radio" id="nhtTrangThai2" name="nhtTrangThai" value="2" />
                                <label for="nhtTrangThai2">Xóa</label>
                            </div>
                            @error('nhtTrangThai')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="card-footer">
                            <button class="btn btn-success">Create</button>
                            <a href="{{ route('nhtadmins.nhtcthoadon') }}" class="btn btn-primary">Back</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        // Hàm tính Thành Tiền
        function calculateThanhTien() {
            var quantity = parseFloat(document.getElementById('nhtSoLuongMua').value);
            var unitPrice = parseFloat(document.getElementById('nhtDonGiaMua').value);
            var thanhTien = quantity * unitPrice;
            document.getElementById('nhtThanhTien').value = thanhTien.toFixed(2);  // Làm tròn đến 2 chữ số thập phân
        }

        // Sự kiện khi chọn sản phẩm, tự động cập nhật Đơn Giá Mua
        document.getElementById('nhtSanPhamID').addEventListener('change', function() {
            var selectedOption = this.options[this.selectedIndex];
            var price = selectedOption.getAttribute('data-price');
            document.getElementById('nhtDonGiaMua').value = price;
            calculateThanhTien();
        });
    </script>
@endsection