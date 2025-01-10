@extends('_layouts.admins._master')

@section('title', 'Create Tin Tức')

@section('content-body')
<div class="container border">
    <div class="row">
        <div class="col">
            <form action="{{ route('nhtadmin.nhttintuc.nhtCreateSubmit') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card">
                    <div class="card-header">
                        <h1>Thêm Mới Tin Tức</h1>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="nhtMaTT" class="form-label">Mã Tin Tức</label>
                            <input type="text" class="form-control" id="nhtMaTT" name="nhtMaTT" value="{{ old('nhtMaTT') }}">
                            @error('nhtMaTT')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="nhtTieuDe" class="form-label">Tiêu đề tin tức</label>
                            <input type="text" class="form-control" id="nhtTieuDe" name="nhtTieuDe" value="{{ old('nhtTieuDe') }}">
                            @error('nhtTieuDe')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="nhtMoTa" class="form-label">Mô tả tin tức</label>
                            <input type="text" class="form-control" id="nhtMoTa" name="nhtMoTa" value="{{ old('nhtMoTa') }}">
                            @error('nhtMoTa')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="nhtNoiDung" class="form-label">Nội dung tin tức</label>
                            <textarea class="form-control" id="nhtNoiDung" name="nhtNoiDung" rows="5">{{ old('nhtNoiDung') }}</textarea>
                            @error('nhtNoiDung')
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
                            <label for="nhtNgayDangTin" class="form-label">Ngày Đăng</label>
                            <input type="datetime-local" class="form-control" id="nhtNgayDangTin" name="nhtNgayDangTin" value="{{ old('nhtNgayDangTin') }}">
                            @error('nhtNgayDangTin')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="nhtNgayCapNhap" class="form-label">Ngày Cập Nhật</label>
                            <input type="datetime-local" class="form-control" id="nhtNgayCapNhap" name="nhtNgayCapNhap" value="{{ old('nhtNgayCapNhap') }}">
                            @error('nhtNgayCapNhap')
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
                        <a href="{{ route('nhtadmins.nhttintuc') }}" class="btn btn-primary">Back</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection