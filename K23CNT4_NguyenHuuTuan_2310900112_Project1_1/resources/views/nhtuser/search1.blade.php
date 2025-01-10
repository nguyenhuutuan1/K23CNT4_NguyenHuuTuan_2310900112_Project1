@extends('_layouts.frontend.user1')

@section('title', 'Trang Chủ')

@section('content-body')
    <div class="container mx-auto mt-6 px-4">
        @if(isset($products) && $products->count() > 0)
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                @foreach($products as $sanpham)
                    <div class="bg-white shadow-lg rounded-lg overflow-hidden transform transition-all hover:scale-105 hover:shadow-xl">
                        <!-- Image -->
                        <img src="{{ asset('storage/' . $sanpham->nhtHinhAnh) }}" class="w-full h-56 object-cover" alt="{{ $sanpham->nhtTenSanPham }}">

                        <div class="p-4">
                            <h5 class="text-lg font-semibold text-gray-800">{{ $sanpham->nhtTenSanPham }}</h5>
                            <p class="text-red-500 font-bold mt-2">{{ number_format($sanpham->nhtDonGia, 0, ',', '.') }} VND</p>
                            <p class="text-sm text-gray-600 mt-2"><small>Số lượng còn lại: {{ $sanpham->nhtSoLuong }}</small></p>

                            <div class="mt-4">
                                <!-- Xem chi tiết (on the first row) -->
                                <div class="mb-2">
                                    <a href="{{ route('nhtuser.show', $sanpham->id) }}"style="text-align:center" class="bg-blue-500 text-white py-2 px-4 rounded-md text-sm hover:bg-blue-600 transition duration-300 w-full block">
                                        Xem Chi Tiết
                                    </a>
                                </div>
                                
                                <!-- Mua and Thêm vào giỏ hàng (on the second row) -->
                                <div class="flex gap-4">
                                    <!-- Mua -->
                                    <a href="javascript:void(0);"   
                                       class="bg-green-500 text-white py-2 px-4 rounded-md text-sm hover:bg-green-600 transition duration-300" 
                                       onclick="return confirm('Bạn muốn mua {{ $sanpham->nhtTenSanPham }} này không ?');" 
                                       title="Mua">
                                        <i class="fa fa-shopping-cart"></i> Mua
                                    </a>
                            
                                    <!-- Thêm vào giỏ hàng -->
                                    <button type="button" class="bg-yellow-500 text-white py-2 px-4 rounded-md text-sm hover:bg-yellow-600 transition duration-300 add-to-cart-btn" 
                                            data-id="{{ $sanpham->id }}" data-name="{{ $sanpham->nhtTenSanPham }}">
                                        <i class="fa fa-cart-plus"></i> Thêm vào giỏ
                                    </button>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Pagination Links -->
            <div class="mt-6 text-center">
                {{ $products->links() }}
            </div>
        @elseif(isset($search))
            <div class="mt-6 text-center text-red-500">
                <p class="text-lg">Không tìm thấy sản phẩm phù hợp với "{{ $search }}".</p>
            </div>
        @endif
    </div>
@endsection


<!-- JavaScript to handle confirmation and AJAX -->
<script>
    // Function to handle adding items to cart
    document.querySelectorAll('.add-to-cart-btn').forEach(function (btn) {
        btn.addEventListener('click', function () {
            var productName = btn.getAttribute('data-name');
            var productId = btn.getAttribute('data-id');

            var userConfirmed = confirm('Bạn có muốn thêm "' + productName + '" vào giỏ hàng không?');
            
            if (userConfirmed) {
                // AJAX request to add product to the cart
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
                        // Update cart count (if needed)
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