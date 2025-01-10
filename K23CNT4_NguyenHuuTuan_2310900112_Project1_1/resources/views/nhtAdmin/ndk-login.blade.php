<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng Nhập - Quản Trị</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    
</head>
<body>

    <div class="login-container">
        <h2>Đăng Nhập</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif

        <form action="{{ route('admins.nhtLoginSubmit') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="nhtTaiKhoan" class="form-label">Tài Khoản</label>
                <input type="text" class="form-control" id="nhtTaiKhoan" name="nhtTaiKhoan" placeholder="Nhập tài khoản" required>
            </div>
            <div class="mb-3">
                <label for="nhtMatKhau" class="form-label">Mật Khẩu</label>
                <input type="password" class="form-control" id="nhtMatKhau" name="nhtMatKhau" placeholder="Nhập mật khẩu" required>
            </div>
            <button type="submit" class="btn btn-primary">Đăng Nhập</button>
        </form>

        <div class="footer-text">
            <p>© 2025 Quản Trị Hệ Thống</p>
        </div>
    </div>

    <!-- Script Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>