@extends('_layouts.admins._master')

@section('title', 'Danh Mục Quản Trị')

@section('content-body')
    <div class="container mt-4">
        <h1 class="mb-4 text-center text-primary">Danh Mục Quản Trị</h1>

        <!-- Nút dẫn đến các danh mục với số lượng -->
        <div class="row">
            <!-- Loại sản phẩm -->
            <div class="col-md-4">
                <div class="card text-center shadow-lg">
                    <div class="card-body bg-primary text-white">
                        <h5 class="card-title">Sản Phẩm</h5>
                        <p class="card-text">{{ $productCount }} sản phẩm</p> <!-- Hiển thị số lượng sản phẩm -->
                        <a href="/nht-admins/nhtdanhsachquantri/nhtsanpham" class="btn btn-outline-light">Xem Sản Phẩm</a>
                    </div>
                </div>
            </div>

            <!-- Tin tức -->
            <div class="col-md-4">
                <div class="card text-center shadow-lg">
                    <div class="card-body bg-info text-white">
                        <h5 class="card-title">Tin Tức</h5>
                        <p class="card-text">Tin Tức New</p>
                        <a href="{{route('nhtAdmins.nhtdanhsachquantri..danhmuc.tintuc')}}" class="btn btn-outline-light">Xem Tin Tức</a>
                    </div>
                </div>
            </div>

            <!-- Tài khoản người dùng -->
            <div class="col-md-4">
                <div class="card text-center shadow-lg">
                    <div class="card-body bg-success text-white">
                        <h5 class="card-title">Tài Khoản Người Dùng</h5>
                        <p class="card-text"> Số lượng người dùng: {{$userCount}}</p>
                        <a href="/nht-admins/nhtdanhsachquantri/nhtnguoidung" class="btn btn-outline-light">Xem Người Dùng</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

