@extends('_layouts.admins._master')

@section('title', 'Chỉnh Sửa Tin Tức')

@section('content-body')
<div class="container border mt-4">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h1>Chỉnh Sửa Tin Tức</h1>
                </div>
                <div class="card-body">
                    <form action="{{ route('nhtadmin.nhttintuc.nhtEditSubmit', $nhttinTuc->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('POST')

                        <div class="mb-3">
                            <label for="nhtTieuDe" class="form-label">Tiêu đề tin tức</label>
                            <input type="text" name="nhtTieuDe" class="form-control" value="{{ old('nhtTieuDe', $nhttinTuc->nhtTieuDe) }}">
                            @error('nhtTieuDe')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="nhtMoTa" class="form-label">Mô tả tin tức</label>
                            <input type="text" name="nhtMoTa" class="form-control" value="{{ old('nhtMoTa', $nhttinTuc->nhtMoTa) }}">
                            @error('nhtMoTa')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="nhtNoiDung" class="form-label">Nội dung tin tức</label>
                            <textarea name="nhtNoiDung" class="form-control" rows="5">{{ old('nhtNoiDung', $nhttinTuc->nhtNoiDung) }}</textarea>
                            @error('nhtNoiDung')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="nhtHinhAnh" class="form-label">Hình ảnh</label>
                            <input type="file" name="nhtHinhAnh" class="form-control">
                            @if($nhttinTuc->nhtHinhAnh)
                                <img src="{{ asset('storage/' . $nhttinTuc->nhtHinhAnh) }}" alt="Tin tức {{ $nhttinTuc->nhtTieuDe }}" width="200" class="mt-2">
                            @endif
                            @error('nhtHinhAnh')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="nhtNgayDangTin" class="form-label">Ngày Đăng</label>
                            <input type="datetime-local" name="nhtNgayDangTin" class="form-control" value="{{ old('nhtNgayDangTin', $nhttinTuc->nhtNgayDangTin) }}">
                            @error('nhtNgayDangTin')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="nhtNgayCapNhap" class="form-label">Ngày Cập Nhật</label>
                            <input type="datetime-local" name="nhtNgayCapNhap" class="form-control" value="{{ old('nhtNgayCapNhap', $nhttinTuc->nhtNgayCapNhap) }}">
                            @error('nhtNgayCapNhap')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="nhtTrangThai" class="form-label">Trạng Thái</label>
                            <div class="col-sm-10">
                                <input type="radio" id="nhtTrangThai1" name="nhtTrangThai" value="1" {{ old('nhtTrangThai', $nhttinTuc->nhtTrangThai) == 1 ? 'checked' : '' }} />
                                <label for="nhtTrangThai1">Khóa</label>
                                &nbsp;
                                <input type="radio" id="nhtTrangThai0" name="nhtTrangThai" value="0" {{ old('nhtTrangThai', $nhttinTuc->nhtTrangThai) == 0 ? 'checked' : '' }} />
                                <label for="nhtTrangThai0">Hiển Thị</label>
                            </div>
                            @error('nhtTrangThai')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">Lưu thay đổi</button>
                    </form>
                </div>
                <div class="card-footer">
                    <a href="{{ route('nhtadmins.nhttintuc') }}" class="btn btn-secondary">Quay lại danh sách</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection