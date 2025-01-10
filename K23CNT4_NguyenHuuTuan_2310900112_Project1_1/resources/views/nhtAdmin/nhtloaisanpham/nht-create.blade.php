@extends('_layouts.admins._master')
@section('title','Create Loại Sản Phẩm')
    
@section('content-body')
    <div class="container border">
        <div class="row">
            <div class="col">
                <form action="{{route('nhtadmin.nhtloaisanpham.nhtCreateSunmit')}}" method="POST">
                    @csrf
                    <div class="card">
                        <div class="card-header">
                            <h1>Thêm Mới loại sản phẩm</h1>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="nhtMaLoai" class="form-label">Mã Loại</label>
                                <input type="text" class="form-control" id="nhtMaLoai" name="nhtMaLoai" value="{{ old('nhtMaLoai') }}" >
                                @error('nhtMaLoai')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="nhtTenLoai" class="form-label">Tên Loại</label>
                                <input type="text" class="form-control" id="nhtTenLoai" name="nhtTenLoai" value="{{ old('nhtTenLoai') }}" >
                                @error('nhtTenLoai')
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
                            <a href="{{route('nhtadmins.nhtloaisanpham')}}" class="btn btn-primary"> Back</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection