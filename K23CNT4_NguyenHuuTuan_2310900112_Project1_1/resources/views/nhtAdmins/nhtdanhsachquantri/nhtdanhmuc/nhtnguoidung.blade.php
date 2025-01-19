@extends('_layouts.admins._master')

@section('title', 'Danh Sách Người Dùng')

@section('content-body')
    <div class="container mt-4">
        <h1 class="mb-4 text-center text-primary">Danh Sách Người Dùng</h1>

        <!-- Form Tìm kiếm -->
        <form action="{{ route('nhtAdmins.nhtdanhsachnguoidung.search') }}" method="GET" class="mb-4">
            <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Tìm kiếm người dùng..." value="{{ request('search') }}">
                <button class="btn btn-primary" type="submit">Tìm kiếm</button>
            </div>
        </form>

        <!-- Nút Thêm mới -->
        <div class="mb-3 text-end">
            <a href="{{ route('nhtAdmins.nhtdanhsachnguoidung.create') }}" class="btn btn-success">+ Thêm Người Dùng</a>
        </div>

        <!-- Bảng danh sách người dùng -->
        <table class="table table-bordered table-striped">
            <thead class="thead-dark">
                <tr>
                    <th scope="col" class="text-center">STT</th>
                    <th scope="col" class="text-center">Tên Người Dùng</th>
                    <th scope="col" class="text-center">Email</th>
                    <th scope="col" class="text-center">Số Điện Thoại</th>
                    <th scope="col" class="text-center">Ngày Đăng Ký</th>
                    <th scope="col" class="text-center">Trạng Thái</th>
                    <th scope="col" class="text-center">Chức Năng</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($nhtnguoidung as $index => $user)
                    <tr>
                        <td class="text-center">{{ $index + 1 + ($nhtnguoidung->currentPage() - 1) * $nhtnguoidung->perPage() }}</td>
                        <td class="text-center">{{ $user->nhtHoTenKhachHang }}</td>
                        <td class="text-center">{{ $user->nhtEmail }}</td>
                        <td class="text-center">{{ $user->nhtDienThoai }}</td>
                        <td class="text-center">{{ $user->nhtNgayDangKy->format('d/m/Y') }}</td>
                        <td class="text-center">
                            @if($user->nhtTrangThai == 0)
                                <span class="badge bg-success">Hoạt Động</span>
                            @elseif($user->nhtTrangThai == 1)
                                <span class="badge bg-warning">Tạm Khóa</span>
                            @else
                                <span class="badge bg-danger">Khóa</span>
                            @endif
                        </td>
                        <td class="text-center">
                            <!-- Nút Chỉnh sửa -->
                            <a href="{{ route('nhtAdmins.nhtdanhsachnguoidung.edit', $user->id) }}" title="Chỉnh sửa" class="text-primary me-2">
                                <i class="fa-solid fa-pen"></i>
                            </a>
                            <!-- Nút Xóa -->
                            <form action="{{ route('nhtAdmins.nhtdanhsachnguoidung.delete', $user->id) }}" method="POST" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-link text-danger p-0" title="Xóa" onclick="return confirm('Bạn có chắc chắn muốn xóa?');">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center text-muted">Không có dữ liệu</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <!-- Phân trang -->
        <div class="mt-4">
            {{ $nhtnguoidung->links() }}
        </div>

        <!-- Nút Quay lại -->
        <div class="text-center mt-3">
            <a href="{{ route('nhtAdmins.nhtdanhsachquantri.danhmuc') }}" class="btn btn-secondary">Quay lại</a>
        </div>
    </div>
@endsection
