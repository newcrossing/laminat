<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index()
    {
        $priceTotal = 0;

        // Общий вес заказа
        $packingWeight = 0;

        $cart = Cart::getCart();

        $products = $cart->products;

        foreach ($products as $product) {
            $priceTotal += $product->getPriceByCount($product->pivot->count);
            $packingWeight += $product->packing_weight * $product->pivot->count;
        }

        return view('front.pages.cart.index',
            compact('products', 'priceTotal', 'packingWeight'));
    }
}
