@extends('_layouts.admins._master')
@section('title', 'Thêm Quản Trị Viên')

@section('content-body')
    <div class="container">
        <form action="{{ route('nhtadmin.nhtquantri.nhtCreateSubmit') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="nhtTaiKhoan">Tài Khoản</label>
                <input type="text" class="form-control" id="nhtTaiKhoan" name="nhtTaiKhoan" required>
                @error('nhtTaiKhoan') <span class="text-danger">{{ $message }}</span> @enderror
            </div>

            <div class="form-group">
                <label for="nhtMatKhau">Mật Khẩu</label>
                <input type="password" class="form-control" id="nhtMatKhau" name="nhtMatKhau" required>
                @error('nhtMatKhau') <span class="text-danger">{{ $message }}</span> @enderror
            </div>

            <div class="form-group">
                <label for="nhtTrangThai">Trạng Thái</label>
                <select name="nhtTrangThai" id="nhtTrangThai" class="form-control" required>
                    <option value="0">Cho Phép Đăng Nhập</option>
                    <option value="1">Khóa</option>
                </select>
            </div>

            <button type="submit" class="btn btn-success">Thêm Quản Trị Viên</button>
        </form>
    </div>
@endsection