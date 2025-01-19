@extends('_layouts.admins._master')
@section('title','Chỉnh Sửa Chi Tiết Hóa Đơn')

@section('content-body')
    <div class="container border">
        <div class="row">
            <div class="col">
                <form action="{{ route('nhtadmin.nhtcthoadon.nhtEditSubmit', $nhtcthoadon->id) }}" method="POST">
                    @csrf
                    @method('POST')
                    <div class="card">
                        <div class="card-header">
                            <h1>Chỉnh Sửa Chi Tiết Hóa Đơn</h1>
                        </div>

                        <div class="mb-3">
                            <label for="nhtHoaDonID" class="form-label">Mã Hóa Đơn</label>
                            <select name="nhtHoaDonID" id="nhtHoaDonID" class="form-control">
                                @foreach ($nhthoadon as $item)
                                    <option value="{{ $item->id }}" {{ $nhtcthoadon->nhtHoaDonID == $item->id ? 'selected' : '' }}>{{ $item->nhtMaHoaDon }}</option>
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
                                    <option value="{{ $item->id }}" {{ $nhtcthoadon->nhtSanPhamID == $item->id ? 'selected' : '' }}>{{ $item->nhtMaSanPham }}</option>
                                @endforeach
                            </select>
                            @error('nhtSanPhamID')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="nhtSoLuongMua" class="form-label">Số Lượng Mua</label>
                            <input type="number" class="form-control" id="nhtSoLuongMua" name="nhtSoLuongMua" value="{{ old('nhtSoLuongMua', $nhtcthoadon->nhtSoLuongMua) }}" min="1" oninput="calculateThanhTien()">
                            @error('nhtSoLuongMua')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="nhtDonGiaMua" class="form-label">Đơn Giá Mua</label>
                            <input type="number" class="form-control" id="nhtDonGiaMua" name="nhtDonGiaMua" value="{{ old('nhtDonGiaMua', $nhtcthoadon->nhtDonGiaMua) }}" oninput="calculateThanhTien()">
                            @error('nhtDonGiaMua')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="nhtThanhTien" class="form-label">Thành Tiền</label>
                            <input type="number" class="form-control" id="nhtThanhTien" name="nhtThanhTien" value="{{ old('nhtThanhTien', $nhtcthoadon->nhtThanhTien) }}" readonly>
                            @error('nhtThanhTien')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="nhtTrangThai" class="form-label">Trạng Thái</label>
                            <div class="col-sm-10">
                                <input type="radio" id="nhtTrangThai0" name="nhtTrangThai" value="0" {{ $nhtcthoadon->nhtTrangThai == 0 ? 'checked' : '' }} />
                                <label for="nhtTrangThai0">Hoàn Thành</label>
                                &nbsp;
                                <input type="radio" id="nhtTrangThai1" name="nhtTrangThai" value="1" {{ $nhtcthoadon->nhtTrangThai == 1 ? 'checked' : '' }} />
                                <label for="nhtTrangThai1">Trả Lại</label>
                                &nbsp;
                                <input type="radio" id="nhtTrangThai2" name="nhtTrangThai" value="2" {{ $nhtcthoadon->nhtTrangThai == 2 ? 'checked' : '' }} />
                                <label for="nhtTrangThai2">Xóa</label>
                            </div>
                            @error('nhtTrangThai')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="card-footer">
                            <button class="btn btn-success">Cập Nhật</button>
                            <a href="{{ route('nhtadmins.nhtcthoadon') }}" class="btn btn-primary">Quay lại</a>
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
    </script>
@endsection