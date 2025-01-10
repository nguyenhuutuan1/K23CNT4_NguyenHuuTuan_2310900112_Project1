@extends('_layouts.admins._master')
@section('title', 'Chỉnh Sửa Quản Trị Viên')

@section('content-body')
    <div class="container">
        <form action="{{ route('nhtadmin.nhtquantri.nhtEditSubmit', $nhtquantri->id) }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="nhtTaiKhoan">Tài Khoản</label>
                <input type="text" class="form-control" id="nhtTaiKhoan" name="nhtTaiKhoan" value="{{ $nhtquantri->nhtTaiKhoan }}" required>
                @error('nhtTaiKhoan') <span class="text-danger">{{ $message }}</span> @enderror
            </div>

            <div class="form-group">
                <label for="nhtMatKhau">Mật Khẩu</label>
                <input type="password" class="form-control" id="nhtMatKhau" name="nhtMatKhau">
                @error('nhtMatKhau') <span class="text-danger">{{ $message }}</span> @enderror
            </div>

            <div class="form-group">
                <label for="nhtTrangThai">Trạng Thái</label>
                <select name="nhtTrangThai" id="nhtTrangThai" class="form-control" required>
                    <option value="0" {{ $nhtquantri->nhtTrangThai == 0 ? 'selected' : '' }}>Cho Phép Đăng Nhập</option>
                    <option value="1" {{ $nhtquantri->nhtTrangThai == 1 ? 'selected' : '' }}>Khóa</option>
                </select>
            </div>

            <button type="submit" class="btn btn-success">Cập Nhật</button>
        </form>
    </div>
@endsection