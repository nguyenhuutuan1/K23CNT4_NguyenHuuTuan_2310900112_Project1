@extends('_layouts.admins._master')

@section('title', 'Chỉnh Sửa Sản Phẩm')

@section('content-body')
<div class="container border mt-4">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h1>Chỉnh Sửa Sản Phẩm</h1>
                </div>
                <div class="card-body">
                    <!-- Form chỉnh sửa sản phẩm -->
                    <form action="{{ route('nhtadmin.nhtsanpham.nhtEditSubmit', $nhtsanpham->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('POST')

                        <!-- Mã sản phẩm -->
                        <div class="mb-3">
                            <label for="nhtMaSanPham" class="form-label">Mã sản phẩm</label>
                            <input type="text" name="nhtMaSanPham" class="form-control" value="{{ old('nhtMaSanPham', $nhtsanpham->nhtMaSanPham) }}">
                            @error('nhtMaSanPham')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Tên sản phẩm -->
                        <div class="mb-3">
                            <label for="nhtTenSanPham" class="form-label">Tên sản phẩm</label>
                            <input type="text" name="nhtTenSanPham" class="form-control" value="{{ old('nhtTenSanPham', $nhtsanpham->nhtTenSanPham) }}">
                            @error('nhtTenSanPham')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Hình ảnh sản phẩm -->
                        <div class="mb-3">
                            <label for="nhtHinhAnh" class="form-label">Hình ảnh</label>
                            <input type="file" name="nhtHinhAnh" class="form-control">
                            @if($nhtsanpham->nhtHinhAnh)
                                <img src="{{ asset('storage/' . $nhtsanpham->nhtHinhAnh) }}" alt="Sản phẩm {{ $nhtsanpham->nhtMaSanPham }}" width="200" class="mt-2">
                            @endif
                            @error('nhtHinhAnh')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Số lượng -->
                        <div class="mb-3">
                            <label for="nhtSoLuong" class="form-label">Số lượng</label>
                            <input type="number" name="nhtSoLuong" class="form-control" value="{{ old('nhtSoLuong', $nhtsanpham->nhtSoLuong) }}">
                            @error('nhtSoLuong')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Đơn giá -->
                        <div class="mb-3">
                            <label for="nhtDonGia" class="form-label">Đơn giá</label>
                            <input type="number" name="nhtDonGia" class="form-control" value="{{ old('nhtDonGia', $nhtsanpham->nhtDonGia) }}">
                            @error('nhtDonGia')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Mã Loại -->
                        <div class="mb-3">
                            <label for="nhtMaLoai" class="form-label">Loại Danh Muc</label>
                            <select name="nhtMaLoai" id="nhtMaLoai" class="form-control">
                                @foreach ($nhtloaisanpham as $item)
                                    <option value="{{ $item->id }}" 
                                        {{ old('nhtMaLoai', $nhtsanpham->nhtMaLoai) == $item->id ? 'selected' : '' }}>
                                        {{ $item->nhtTenLoai }}
                                    </option>
                                @endforeach
                            </select>
                            @error('nhtMaLoai')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>


                        <!-- Trạng thái -->
                        <div class="mb-3">
                            <label for="nhtTrangThai" class="form-label">Trạng Thái</label>
                            <div class="col-sm-10">
                                <input type="radio" id="nhtTrangThai1" name="nhtTrangThai" value="1" {{ old('nhtTrangThai', $nhtsanpham->nhtTrangThai) == 1 ? 'checked' : '' }} />
                                <label for="nhtTrangThai1">Khóa</label>
                                &nbsp;
                                <input type="radio" id="nhtTrangThai0" name="nhtTrangThai" value="0" {{ old('nhtTrangThai', $nhtsanpham->nhtTrangThai) == 0 ? 'checked' : '' }} />
                                <label for="nhtTrangThai0">Hiển Thị</label>
                            </div>
                            @error('nhtTrangThai')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <!-- Nút lưu -->
                        <button type="submit" class="btn btn-primary">Lưu thay đổi</button>
                    </form>
                </div>
                <div class="card-footer">
                    <!-- Nút quay lại danh sách sản phẩm -->
                    <a href="{{ route('nhtadims.nhtsanpham') }}" class="btn btn-secondary">Quay lại danh sách</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection