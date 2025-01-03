@extends('_layouts.admins._master')
@section('title','Sửa Loại Khách Hàng')

@section('content-body')
    <div class="container border">
        <div class="row">
            <div class="col">
                <!-- Update the form action route to pass the nhtMaKhachHang as a parameter -->
                <form action="{{ route('nhtadmin.nhtkhachhang.nhtEditSubmit', ['id' => $nhtkhachhang->id]) }}" method="POST">
                    @csrf
                    <!-- Hidden input for the ID -->
                    <input type="hidden" name="id" value="{{ $nhtkhachhang->id }}">

                    <div class="card">
                        <div class="card-header">
                            <h1>Sửa loại Khách Hàng</h1>
                        </div>
                        <div class="card-body">
                            <!-- Mã Loại (disabled) -->
                            <div class="mb-3">
                                <label for="nhtMaKhachHang" class="form-label">Mã Khách Hàng</label>
                                <input type="text" class="form-control" id="nhtMaKhachHang" name="nhtMaKhachHang" value="{{ $nhtkhachhang->nhtMaKhachHang }}" >
                                @error('nhtMaKhachHang')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            </div>

                            <!-- Tên Loại -->
                            <div class="mb-3">
                                <label for="nhtHoTenKhachHang" class="form-label">Họ Tên Khách Hàng</label>
                                <input type="text" class="form-control" id="nhtHoTenKhachHang" name="nhtHoTenKhachHang" value="{{ old('nhtHoTenKhachHang', $nhtkhachhang->nhtHoTenKhachHang) }}" >
                                @error('nhtHoTenKhachHang')
                                    <span class="text-danger">{{ $message }}</span> 
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="nhtEmail" class="form-label">Email</label>
                                <input type="email" class="form-control" id="nhtEmail" name="nhtEmail" value="{{ old('nhtEmail', $nhtkhachhang->nhtEmail) }}" >
                                @error('nhtEmail')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="nhtMatKhau" class="form-label">Mật Khẩu</label>
                                <input type="password" class="form-control" id="nhtMatKhau" name="nhtMatKhau" value="{{ old('nhtMatKhau', $nhtkhachhang->nhtMatKhau) }}" >
                                @error('nhtMatKhau')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="nhtDienThoai" class="form-label">Điện Thoại</label>
                                <input type="tel" class="form-control" id="nhtDienThoai" name="nhtDienThoai" value="{{ old('nhtDienThoai', $nhtkhachhang->nhtDienThoai) }}" >
                                @error('nhtDienThoai')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="nhtDiaChi" class="form-label">Địa Chỉ</label>
                                <input type="text" class="form-control" id="nhtDiaChi" name="nhtDiaChi" value="{{ old('nhtDiaChi', $nhtkhachhang->nhtDiaChi) }}" >
                                @error('nhtDiaChi')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="nhtNgayDangKy" class="form-label">Ngày Đăng Ký</label>
                                <input type="date" class="form-control" id="nhtNgayDangKy" name="nhtNgayDangKy" value="{{ old('nhtNgayDangKy', $nhtkhachhang->nhtNgayDangKy) }}" >
                                @error('nhtNgayDangKy')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Trạng Thái -->
                            <div class="mb-3">
                                <label for="nhtTrangThai" class="form-label">Trạng Thái</label>
                                <div class="col-sm-10">
                                    <input type="radio" id="nhtTrangThai0" name="nhtTrangThai" value="0" {{ old('nhtTrangThai', $nhtkhachhang->nhtTrangThai) == 0 ? 'checked' : '' }} />
                                    <label for="nhtTrangThai0">Hoạt Động</label>
                                    &nbsp;
                                    <input type="radio" id="nhtTrangThai1" name="nhtTrangThai" value="1" {{ old('nhtTrangThai', $nhtkhachhang->nhtTrangThai) == 1 ? 'checked' : '' }} />
                                    <label for="nhtTrangThai1">Tạm Khóa</label>
                           
                                    &nbsp;
                                    <input type="radio" id="nhtTrangThai2" name="nhtTrangThai" value="2" {{ old('nhtTrangThai', $nhtkhachhang->nhtTrangThai) == 2 ? 'checked' : '' }} />
                                    <label for="nhtTrangThai0">Khóa</label>
                                </div>
                                @error('nhtTrangThai')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                        </div>
                        <div class="card-footer">
                            <!-- Change button label to "Cập nhật" (Update) -->
                            <button class="btn btn-success" type="submit">Cập nhật</button>
                            <a href="{{ route('nhtadmins.nhtkhachhang') }}" class="btn btn-primary">Trở lại</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection