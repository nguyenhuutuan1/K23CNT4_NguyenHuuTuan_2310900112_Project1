<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    /**
     * Thêm sản phẩm vào giỏ hàng
     */
    public function addToCart(Request $request)
    {
        $request->validate([
            'product_id' => 'required|integer',
            'product_name' => 'required|string|max:255',
        ]);

        $productId = $request->input('product_id');
        $productName = $request->input('product_name');
        $cart = Session::get('cart', []);

        if (isset($cart[$productId])) {
            $cart[$productId]['quantity'] += 1;
        } else {
            $cart[$productId] = [
                'name' => $productName,
                'quantity' => 1,
            ];
        }

        Session::put('cart', $cart);

        return response()->json([
            'success' => true,
            'message' => 'Sản phẩm đã được thêm vào giỏ hàng.',
            'cart_count' => count($cart),
        ]);
    }

    /**
     * Hiển thị giỏ hàng
     */
    public function showCart()
    {
        $cart = Session::get('cart', []);
        return view('cart.index', compact('cart'));
    }

    /**
     * Xóa sản phẩm khỏi giỏ hàng
     */
    public function removeFromCart(Request $request)
    {
        $request->validate([
            'product_id' => 'required|integer',
        ]);

        $productId = $request->input('product_id');
        $cart = Session::get('cart', []);

        if (isset($cart[$productId])) {
            unset($cart[$productId]);
            Session::put('cart', $cart);
        }

        return response()->json([
            'success' => true,
            'message' => 'Sản phẩm đã được xóa khỏi giỏ hàng.',
            'cart_count' => count($cart),
        ]);
    }
}
