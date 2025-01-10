<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="utf-8"/>
  <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
  <title>Bán Điện Thoại</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
  <style>
    .header {
      position: fixed; /* Đặt vị trí cố định */
      top: 0;
      left: 0;
      right: 0;
      z-index: 10; /* Đảm bảo tiêu đề nằm trên các phần tử khác */
    }
    .header + .container {
      margin-top: 140px; /* Để tránh nội dung bị che khuất bởi tiêu đề cố định */
    }

    /* Thêm hiệu ứng hover cho các liên kết */
    .header a:hover {
      text-decoration: underline;
      color: rgb(255, 99, 71);
    }

    /* Thêm hiệu ứng hover cho giỏ hàng */
    #cart-icon:hover {
      color: rgb(255, 99, 71);
      cursor: pointer;
    }

    /* Badge giỏ hàng */
    #cart-count {
      position: absolute;
      top: 0;
      right: 0;
      background-color: #f44336;
      color: white;
      font-size: 0.75rem;
      border-radius: 50%;
      padding: 0.2rem 0.5rem;
    }

    /* Hiệu ứng khi hover vào hình ảnh sản phẩm */
    .product-image {
      transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .product-image:hover {
      transform: scale(1.05); /* Phóng to hình ảnh khi hover */
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2); /* Thêm bóng đổ */
    }

    /* Hiệu ứng cho các phần tử khi tải trang */
    .fade-in {
      animation: fadeIn 0.8s ease-out;
    }

    @keyframes fadeIn {
      0% { opacity: 0; }
      100% { opacity: 1; }
    }

    /* Hiệu ứng khi cuộn trang */
    .scroll-up {
      opacity: 0;
      transform: translateY(20px);
      transition: opacity 0.5s ease, transform 0.5s ease;
    }

    .scroll-up.visible {
      opacity: 1;
      transform: translateY(0);
    }
  </style>
</head>
<body class="bg-gradient-to-r from-red-500 to-orange-500 text-white">
  <div class="header bg-gradient-to-r from-purple-500 to-pink-500">
    <div class="container mx-auto">
      <!-- Top Navigation -->
      <div class="flex justify-between items-center py-2 text-sm">
        <div>
          <a class="mr-4" href="{{route('nhtuser.home1')}}">Trang Chủ</a>
          <a class="mr-4" href="#">Tải ứng dụng</a>
          <a class="mr-4" href="#">Kết nối</a>
          <a class="mr-2" href="https://www.facebook.com/yourprofile" target="_blank" rel="noopener noreferrer">
              <i class="fab fa-facebook"></i>
            </a>
            <a href="https://www.instagram.com/yourprofile" target="_blank" rel="noopener noreferrer">
              <i class="fab fa-instagram"></i>
            </a>
        </div>
        <div class="flex items-center space-x-4">
          <a class="hover:underline" href="#"><i class="fas fa-bell"></i> Thông Báo</a>
          <a class="hover:underline" href="nht-user/support">
              <i class="fas fa-question-circle"></i> Hỗ Trợ
          </a>
          <a class="hover:underline" href="#"><i class="fas fa-globe"></i> Tiếng Việt</a>
          <a class="flex items-center space-x-1" href="#">
              <i class="fas fa-user"></i>
              <span>{{ Session::has('username1') ? 'Hello, ' . Session::get('username1') : '' }}</span>
          </a>
          @if(Session::has('username1'))
              <a class="hover:underline" href="{{ route('nhtuser.home') }}">
                  Đăng Xuất
              </a>
          @else
              <a class="hover:underline" href="{{ route('nhtuser.login') }}">
                  Đăng Nhập
              </a>
          @endif
        </div>
      </div>
      <!-- Main Navigation -->
      <div class="flex items-center py-4">
        <div class="flex items-center">
          <a href="{{route('nhtuser.home1')}}">
              <img alt="logo" class="mr-2" height="130" src="/storage/img/san_pham/Logo.png" width="130"/>
          </a>
          <span class="text-2xl font-bold" style="color: rgb(255, 99, 71);">nht SMART</span>
        </div>
        <div class="flex-grow mx-4">
          <form action="{{route('nhtuser.search1')}}" method="GET" class="flex">
            <input class="w-full py-2 px-4 rounded-l-md text-gray-700 focus:outline-none focus:ring-2 focus:ring-red-500" placeholder="Tìm Kiếm... !" type="text" name="search"/>
            <button type="submit" class="bg-white text-red-500 py-2 px-4 rounded-r-md hover:bg-red-500 hover:text-white transition duration-200">
              <i class="fas fa-search"></i>
            </button>
          </form>
        </div>
        <div class="relative">
          <i class="fas fa-shopping-cart text-2xl" id="cart-icon"></i>
          <span id="cart-count" class="absolute top-0 right-0">0</span> <!-- Badge giỏ hàng -->
        </div>
      </div>
    </div>
  </div>
  <div class="container mx-auto">
    <!-- Nội dung trang web sẽ hiển thị ở đây -->

    <!-- Ví dụ sản phẩm với hiệu ứng hover -->
    <div class="flex flex-wrap justify-center gap-8 py-10">
      <div class="product-item transition-all hover:scale-105">
        <img class="product-image rounded-lg shadow-lg w-64 h-64 object-cover" src="https://via.placeholder.com/250" alt="Product 1"/>
        <div class="text-center mt-4 text-xl font-semibold">Sản phẩm 1</div>
      </div>
      <div class="product-item transition-all hover:scale-105">
        <img class="product-image rounded-lg shadow-lg w-64 h-64 object-cover" src="https://via.placeholder.com/250" alt="Product 2"/>
        <div class="text-center mt-4 text-xl font-semibold">Sản phẩm 2</div>
      </div>
    </div>

  </div>

  <script>
    // Hiệu ứng khi cuộn trang
    const scrollUpElements = document.querySelectorAll('.scroll-up');
    window.addEventListener('scroll', () => {
      scrollUpElements.forEach(element => {
        if (element.getBoundingClientRect().top < window.innerHeight) {
          element.classList.add('visible');
        }
      });
    });
  </script>

</body>
</html>