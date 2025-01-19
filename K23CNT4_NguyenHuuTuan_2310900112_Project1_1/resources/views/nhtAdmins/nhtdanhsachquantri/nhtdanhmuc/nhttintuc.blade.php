@extends('_layouts.admins._master')

@section('title', 'Danh Sách Sản Phẩm Tạp Hóa')

@section('content-body')
    <div class="container mt-5">
        <h1 class="text-center text-primary mb-4" style="font-family: 'Roboto', sans-serif;">Danh Sách Sản Phẩm Tạp Hóa</h1>

        <!-- Bảng hiển thị danh sách sản phẩm -->
        <table class="table table-bordered table-striped">
            <thead class="thead-dark">
                <tr>
                    <th scope="col" class="text-center">STT</th>
                    <th scope="col" class="text-center">Mã Sản Phẩm</th>
                    <th scope="col" class="text-center">Tên Sản Phẩm</th>
                    <th scope="col" class="text-center">Hình Ảnh</th>
                    <th scope="col" class="text-center">Số Lượng</th>
                    <th scope="col" class="text-center">Đơn Giá</th>
                    <th scope="col" class="text-center">Mã Loại</th>
                    <th scope="col" class="text-center">Trạng Thái</th>
                    <th scope="col" class="text-center">Chức Năng</th>
                </tr>
            </thead>

            <tbody>
                @php
                    $stt = 0;
                @endphp
                @forelse ($nhtsanphams as $item)
                    @php
                        $stt++;
                    @endphp
                    <tr class="text-center">
                        <td>{{ $stt }}</td>
                        <td>{{ $item->nhtMaSanPham }}</td>
                        <td>{{ $item->nhtTenSanPham }}</td>
                        <td>
                            <img src="{{ asset('storage/' . $item->nhtHinhAnh) }}" alt="Hình ảnh {{ $item->nhtTenSanPham }}" width="100" height="100">
                        </td>
                        <td>{{ $item->nhtSoLuong }}</td>
                        <td>{{ number_format($item->nhtDonGia, 0, ',', '.') }} VND</td>
                        <td>{{ $item->nhtMaLoai }}</td>
                        <td>
                            @if ($item->nhtTrangThai == 0)
                                <span class="badge bg-success">Hiển Thị</span>
                            @else
                                <span class="badge bg-danger">Khóa</span>
                            @endif
                        </td>
                        <td>
                            <div class="btn-group" role="group">
                                <!-- Xem chi tiết -->
                                <a href="{{ route('nhtadmin.nhtsanpham.nhtDetail', $item->id) }}" class="btn btn-success btn-sm" title="Xem">
                                    <i class="fa-solid fa-eye"></i>
                                </a>
                                <!-- Chỉnh sửa -->
                                <a href="{{ route('nhtadmin.nhtsanpham.nhtedit', $item->id) }}" class="btn btn-primary btn-sm" title="Chỉnh sửa">
                                    <i class="fa-solid fa-pen"></i>
                                </a>
                                <!-- Xóa -->
                                <a href="{{ route('nhtadmin.nhtsanpham.nhtdelete', $item->id) }}" class="btn btn-danger btn-sm"
                                   onclick="return confirm('Bạn có chắc muốn xóa sản phẩm này không? Mã SP: {{ $item->nhtMaSanPham }}');"
                                   title="Xóa">
                                    <i class="fa-regular fa-trash-can"></i>
                                </a>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="9" class="text-center text-muted">Chưa có sản phẩm nào</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <!-- Nút Thêm Mới -->
        <div class="text-center mt-3">
            <a href="{{ route('nhtadmin.nhtsanpham.nhtcreate') }}" class="btn btn-success btn-lg">
                <i class="fa-solid fa-plus-circle"></i> Thêm Sản Phẩm Mới
            </a>
        </div>
    </div>
@endsection
