@extends('_layouts.frontend.user1')

@section('title', 'Trang Chủ')

@section('content-body')
    <div class="container">

        <h1>Chào mừng đến với Trang Chủ</h1>
    
       

        <p>Đây là giao diện người dùng, nơi bạn có thể xem thông tin và tương tác với các tính năng của website.</p>

        <div class="row">
            @foreach ($sanPhams as $sanPham)
            
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <img src="{{ asset('storage/' . $sanPham->nhtHinhAnh) }}" class="card-img-top product-img" alt="{{ $sanPham->nhtTenSanPham }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $sanPham->nhtTenSanPham }}</h5>
                            <p class="card-text"><strong>{{ number_format($sanPham->nhtDonGia, 0, ',', '.') }} VND</strong></p>
                            <p class="card-text"><small class="text-muted">Số lượng còn lại: {{ $sanPham->nhtSoLuong }}</small></p>
                            
                            <a href="{{ route('nhtuser.show', $sanPham->id) }}" class="btn btn-primary btn-sm flex " style="justify-content: center">Xem Chi Tiết</a>

                            <a href="{{ route('sanpham.show', ['sanPham' => $sanPham->id]) }}" class="btn btn-primary btn-sm">
                                <i class="fa fa-shopping-cart"></i> Mua
                            </a>
                            

                        <button type="button" class="btn btn-warning btn-sm add-to-cart-btn" data-id="{{ $sanPham->id }}" data-name="{{ $sanPham->nhtTenSanPham }}">
                        <i class="fa fa-cart-plus"></i> Thêm vào giỏ
                    </button>

                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <div class="d-flex justify-content-center mt-3">
        {{ $sanPhams->links('pagination::bootstrap-5') }}
    </div>
@endsection


<script>
    document.querySelectorAll('.add-to-cart-btn').forEach(function (btn) {
        btn.addEventListener('click', function () {
            var productName = btn.getAttribute('data-name');
            var productId = btn.getAttribute('data-id');

            var userConfirmed = confirm('Bạn có muốn thêm "' + productName + '" vào giỏ hàng không?');
            
            if (userConfirmed) {
                fetch('/add-to-cart/' + productId, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({ product_id: productId })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        alert('Sản phẩm đã được thêm vào giỏ hàng!');
                        document.querySelector('.cart-count').innerText = data.cart_count;
                    } else {
                        alert('Có lỗi xảy ra, vui lòng thử lại!');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('Có lỗi xảy ra, vui lòng thử lại!');
                });
            }
        });
    });
</script>