@extends('_layouts.admins._master')
@section('title','Sửa Loại Hóa Đơn')

@section('content-body')
    <div class="container border">
        <div class="row">
            <div class="col">
                <!-- Update the form action route to pass the nhtMaKhachHang as a parameter -->
                <form action="{{ route('nhtadmin.nhthoadon.nhtEditSubmit', ['id' => $nhthoadon->id]) }}" method="POST">
                    @csrf
                    <!-- Hidden input for the ID -->
                    <input type="hidden" name="id" value="{{ $nhthoadon->id }}">

                    <div class="card">
                        <div class="card-header">
                            <h1>Sửa loại Hóa Đơn</h1>
                        </div>
                        <div class="card-body">
                            <!-- Mã Loại (disabled) -->
                            <div class="mb-3">
                                <label for="nhtMaHoaDon" class="form-label">Mã Hóa Đơn</label>
                                <input type="text" class="form-control" id="nhtMaHoaDon" name="nhtMaHoaDon" value="{{ $nhthoadon->nhtMaHoaDon }}" >
                                @error('nhtMaHoaDon')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            </div>

                            <div class="mb-3">
                                <label for="nhtMaKhachHang" class="form-label">Khách Hàng</label>
                                <select name="nhtMaKhachHang" id="nhtMaKhachHang" class="form-control">
                                    @foreach ($nhtkhachhang as $item)
                                        <option value="{{ $item->id }}" 
                                            {{ old('nhtMaKhachHang', $nhthoadon->nhtMaKhachHang) == $item->id ? 'selected' : '' }}>
                                            {{ $item->nhtHoTenKhachHang }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('nhtMaKhachHang')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                             
                             <div class="mb-3">
                                <label for="nhtNgayHoaDon" class="form-label">Ngày Hóa Đơn</label>
                                <input type="date" class="form-control" id="nhtNgayHoaDon" name="nhtNgayHoaDon" value="{{ old('nhtNgayHoaDon', $nhthoadon->nhtNgayHoaDon) }}" >
                                @error('nhtNgayHoaDon')
                                    <span class="text-danger">{{ $message }}</span> 
                                @enderror
                            </div>

                             <div class="mb-3">
                                <label for="nhtNgayNhan" class="form-label">Ngày Nhận</label>
                                <input type="date" class="form-control" id="nhtNgayNhan" name="nhtNgayNhan" value="{{ old('nhtNgayNhan', $nhthoadon->nhtNgayNhan) }}" >
                                @error('nhtNgayNhan')
                                    <span class="text-danger">{{ $message }}</span> 
                                @enderror
                            </div>


                            <!-- Tên Loại -->
                            <div class="mb-3">
                                <label for="nhtHoTenKhachHang" class="form-label">Họ Tên Khách Hàng</label>
                                <input type="text" class="form-control" id="nhtHoTenKhachHang" name="nhtHoTenKhachHang" value="{{ old('nhtHoTenKhachHang', $nhthoadon->nhtHoTenKhachHang) }}" >
                                @error('nhtHoTenKhachHang')
                                    <span class="text-danger">{{ $message }}</span> 
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="nhtEmail" class="form-label">Email</label>
                                <input type="email" class="form-control" id="nhtEmail" name="nhtEmail" value="{{ old('nhtEmail', $nhthoadon->nhtEmail) }}" >
                                @error('nhtEmail')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            

                            <div class="mb-3">
                                <label for="nhtDienThoai" class="form-label">Điện Thoại</label>
                                <input type="tel" class="form-control" id="nhtDienThoai" name="nhtDienThoai" value="{{ old('nhtDienThoai', $nhthoadon->nhtDienThoai) }}" >
                                @error('nhtDienThoai')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="nhtDiaChi" class="form-label">Địa Chỉ</label>
                                <input type="text" class="form-control" id="nhtDiaChi" name="nhtDiaChi" value="{{ old('nhtDiaChi', $nhthoadon->nhtDiaChi) }}" >
                                @error('nhtDiaChi')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="nhtTongGiaTri" class="form-label">Tổng Giá Trị</label>
                                <input type="number" class="form-control" id="nhtTongGiaTri" name="nhtTongGiaTri" value="{{ old('nhtTongGiaTri', $nhthoadon->nhtTongGiaTri) }}" >
                                @error('nhtTongGiaTri')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Trạng Thái -->
                            <div class="mb-3">
                                <label for="nhtTrangThai" class="form-label">Trạng Thái</label>
                                <div class="col-sm-10">
                                    <input type="radio" id="nhtTrangThai0" name="nhtTrangThai" value="0" {{ old('nhtTrangThai', $nhthoadon->nhtTrangThai) == 0 ? 'checked' : '' }} />
                                    <label for="nhtTrangThai0">Chờ Sử Lý</label>
                                    &nbsp;
                                    <input type="radio" id="nhtTrangThai1" name="nhtTrangThai" value="1" {{ old('nhtTrangThai', $nhthoadon->nhtTrangThai) == 1 ? 'checked' : '' }} />
                                    <label for="nhtTrangThai1">Đang Sử Lý</label>
                           
                                    &nbsp;
                                    <input type="radio" id="nhtTrangThai2" name="nhtTrangThai" value="2" {{ old('nhtTrangThai', $nhthoadon->nhtTrangThai) == 2 ? 'checked' : '' }} />
                                    <label for="nhtTrangThai0">Đã Hoàn Thành</label>
                                </div>
                                @error('nhtTrangThai')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                        </div>
                        <div class="card-footer">
                            <!-- Change button label to (edit) -->
                            <button class="btn btn-success" type="submit">Sửa</button>
                            <a href="{{ route('nhtadmins.nhthoadon') }}" class="btn btn-primary">Trở lại</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection