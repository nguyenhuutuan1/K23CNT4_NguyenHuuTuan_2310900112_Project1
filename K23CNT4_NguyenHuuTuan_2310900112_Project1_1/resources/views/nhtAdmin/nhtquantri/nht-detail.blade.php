@extends('_layouts.admins._master')
@section('title','Create  Sản Phẩm')
    
@section('content-body')
    <div class="container border">
        <div class="row">
            <div class="col">
                <form action="{{route('nhtadmin.nhtsanpham.nhtCreateSubmit')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card">
                        <div class="card-header">
                            <h1>Thêm Mới sản phẩm</h1>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="nhtMaSanPham" class="form-label">Mã sản phẩm</label>
                                <input type="text" class="form-control" id="nhtMaSanPham" name="nhtMaSanPham" value="{{ old('nhtMaSanPham') }}" >
                                @error('nhtMaSanPham')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="nhtTenSanPham" class="form-label">Tên sản phẩm</label>
                                <input type="text" class="form-control" id="nhtTenSanPham" name="nhtTenSanPham" value="{{ old('nhtTenSanPham') }}" >
                                @error('nhtTenSanPham')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            
                            <div class="mb-3">
                                <label for="nhtHinhAnh" class="form-label">Hình Ảnh</label>
                                <input type="file" class="form-control" id="nhtHinhAnh" name="nhtHinhAnh" accept="image/*">
                                @error('nhtHinhAnh')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            

                            <div class="mb-3">
                                <label for="nhtSoLuong" class="form-label">Số Lượng</label>
                                <input type="number" class="form-control" id="nhtSoLuong" name="nhtSoLuong" value="{{ old('nhtSoLuong') }}" >
                                @error('nhtSoLuong')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="nhtDonGia" class="form-label">Đơn Giá</label>
                                <input type="number" class="form-control" id="nhtDonGia" name="nhtDonGia" value="{{ old('nhtDonGia') }}" >
                                @error('nhtDonGia')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="nhtMaLoai" class="form-label">Loại Danh Muc</label>
                                <select name="nhtMaLoai" id="nhtMaLoai" class="form-control">
                                    @foreach ($nhtloaisanpham as $item)
                                        <option value="{{ $item->id }}">{{ $item->nhtTenLoai }}</option>
                                    @endforeach
                                </select>
                                @error('nhtMaLoai')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            

                            <div class="mb-3">
                                <label for="nhtTrangThai" class="form-label">Trạng Thái</label>
                                <div class="col-sm-10">
                                    <input type="radio" id="nhtTrangThai1" name="nhtTrangThai" value="0" checked/>
                                    <label for="nhtTrangThai1"> Hiển Thị</label>
                                    &nbsp;
                                    <input type="radio" id="nhtTrangThai0" name="nhtTrangThai" value="1"/>
                                    <label for="nhtTrangThai0">Khóa</label>
                                </div>
                                @error('nhtTrangThai')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="card-footer">
                            <button class="btn btn-success">Create</button>
                            <a href="{{route('nhtadims.nhtsanpham')}}" class="btn btn-primary"> Back</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection