@extends('_layouts.admins._master')
@section('title','Create Hóa Đơn')
    
@section('content-body')
    <div class="container border">
        <div class="row">
            <div class="col">
                <form action="{{route('nhtadmin.nhthoadon.nhtCreateSubmit')}}" method="POST">
                    @csrf
                    <div class="card">
                        <div class="card-header">
                            <h1>Thêm Mới Hóa Đơn</h1>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="nhtMaHoaDon" class="form-label">Mã Hóa Đơn</label>
                                <input type="text" class="form-control" id="nhtMaHoaDon" name="nhtMaHoaDon" value="{{ old('nhtMaHoaDon') }}" >
                                @error('nhtMaHoaDon')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="nhtMaKhachHang" class="form-label">Khách Hàng</label>
                                <select name="nhtMaKhachHang" id="nhtMaKhachHang" class="form-control">
                                    @foreach ($nhtkhachhang as $item)
                                        <option value="{{ $item->id }}">{{ $item->nhtHoTenKhachHang }}</option>
                                    @endforeach
                                </select>
                                @error('nhtMaKhachHang')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="nhtNgayHoaDon" class="form-label">Ngày Hóa Đơn</label>
                                <input type="date" class="form-control" id="nhtNgayHoaDon" name="nhtNgayHoaDon" value="{{ old('nhtNgayHoaDon') }}" >
                                @error('nhtNgayHoaDon')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="nhtNgayNhan" class="form-label">Ngày Nhận</label>
                                <input type="date" class="form-control" id="nhtNgayNhan" name="nhtNgayNhan" value="{{ old('nhtNgayNhan') }}" >
                                @error('nhtNgayNhan')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="nhtHoTenKhachHang" class="form-label">Họ Tên Khách Hàng</label>
                                <input type="text" class="form-control" id="nhtHoTenKhachHang" name="nhtHoTenKhachHang" value="{{ old('nhtHoTenKhachHang') }}" >
                                @error('nhtHoTenKhachHang')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="nhtEmail" class="form-label">Email</label>
                                <input type="Email" class="form-control" id="nhtEmail" name="nhtEmail" value="{{ old('nhtEmail') }}" >
                                @error('nhtEmail')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="nhtDienThoai" class="form-label">Điện Thoại</label>
                                <input type="tel" class="form-control" id="nhtDienThoai" name="nhtDienThoai" value="{{ old('nhtDienThoai') }}" >
                                @error('nhtDienThoai')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="nhtDiaChi" class="form-label">Địa Chỉ</label>
                                <input type="text" class="form-control" id="nhtDiaChi" name="nhtDiaChi" value="{{ old('nhtDiaChi') }}" >
                                @error('nhtDiaChi')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="nhtTongGiaTri" class="form-label">Tổng Giá Trị</label>
                                <input type="number" class="form-control" id="nhtTongGiaTri" name="nhtTongGiaTri" value="{{ old('nhtTongGiaTri') }}" >
                                @error('nhtTongGiaTri')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="nhtTrangThai" class="form-label">Trạng Thái</label>
                                <div class="col-sm-10">
                                    <input type="radio" id="nhtTrangThai0" name="nhtTrangThai" value="0" checked/>
                                    <label for="nhtTrangThai1">Chờ Sử Lý</label>
                                    &nbsp;
                                    <input type="radio" id="nhtTrangThai1" name="nhtTrangThai" value="1"/>
                                    <label for="nhtTrangThai0">Đang Sử Lý</label>
                                    &nbsp;
                                    <input type="radio" id="nhtTrangThai2" name="nhtTrangThai" value="2"/>
                                    <label for="nhtTrangThai0">Đã hoàn Thành</label>
                                </div>
                                @error('nhtTrangThai')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="card-footer">
                            <button class="btn btn-success">Create</button>
                            <a href="{{route('nhtadmins.nhthoadon')}}" class="btn btn-primary"> Back</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection