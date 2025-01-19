<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang Quản Trị</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head>
<body>
<header>
    <div class="container d-flex justify-content-between align-items-center">
        <!-- Logo -->
        <div class="logo">
            <a href="/nht-admins">
                <img src="{{ asset('storage/img/san_pham/Logo.png') }}" alt="Logo">
            </a>
        </div>

        <!-- Navigation -->
        <nav class="d-flex align-items-center">
            <a href="/nht-admins" class="nav-link">Trang chủ</a>
            <a href="/nht-admins/nhtdanhsachquantri/nhtsanpham" class="nav-link">Sản phẩm</a>
            <a href="/nht-admins/nht-khach-hang" class="nav-link">Liên hệ</a>
        </nav>

        <!-- Search Form -->
        <form action="{{ route('nhtuser.searchAdmins') }}" method="GET" class="search-form d-flex">
            <input type="text" class="form-control" placeholder="Tìm kiếm..." name="search">
            <button type="submit" class="btn">
                <i class="fas fa-search"></i>
            </button>
        </form>

        <!-- Account Info -->
        <div class="account-info d-flex align-items-center">
            <span>Xin chào, Huu Tuan</span>
            <a href="{{ route('admins.nhtLogin') }}">Đăng xuất</a>
        </div>
    </div>
</header>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>