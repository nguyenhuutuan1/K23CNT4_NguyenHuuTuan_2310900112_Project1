@extends('_layouts.admins._master')
@section('title','Sửa Loại Sản Phẩm')

@section('content-body')
    <div class="container border">
        <div class="row">
            <div class="col">
                <form action="{{ route('nhtadmin.nhtloaisanpham.nhtEditSubmit') }}" method="POST">
                    @csrf
                    <input type="hidden" name="id" value="{{ $nhtloaisanpham->id }}">

                    <div class="card">
                        <div class="card-header">
                            <h1>Sửa loại sản phẩm</h1>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="nhtMaLoai" class="form-label">Mã Loại</label>
                                <input type="text" class="form-control" id="nhtMaLoai" name="nhtMaLoai" value="{{ $nhtloaisanpham->nhtMaLoai }}" >
                                @error('nhtMaLoai')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            </div>
                            <div class="mb-3">
                                <label for="nhtTenLoai" class="form-label">Tên Loại</label>
                                <input type="text" class="form-control" id="nhtTenLoai" name="nhtTenLoai" value="{{ old('nhtTenLoai', $nhtloaisanpham->nhtTenLoai) }}" >
                                @error('nhtTenLoai')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="nhtTrangThai" class="form-label">Trạng Thái</label>
                                <div class="col-sm-10">
                                    <input type="radio" id="nhtTrangThai1" name="nhtTrangThai" value="1" {{ old('nhtTrangThai', $nhtloaisanpham->nhtTrangThai) == 1 ? 'checked' : '' }} />
                                    <label for="nhtTrangThai1">Khóa</label>
                                    &nbsp;
                                    <input type="radio" id="nhtTrangThai0" name="nhtTrangThai" value="0" {{ old('nhtTrangThai', $nhtloaisanpham->nhtTrangThai) == 0 ? 'checked' : '' }} />
                                    <label for="nhtTrangThai0">Hiển Thị</label>
                                </div>
                                @error('nhtTrangThai')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                        </div>
                        <div class="card-footer">
                            <button class="btn btn-success" type="submit">Cập nhật</button>
                            <a href="{{ route('nhtadmins.nhtloaisanpham') }}" class="btn btn-primary">Trở lại</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection