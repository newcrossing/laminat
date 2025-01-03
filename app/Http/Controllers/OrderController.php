<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class OrderController extends Controller
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

        $breadcrumbs = [
            ['link' => route('home'), 'name' => "Главная"],
            ['name' => " Оформление заказа "]
        ];
        return view('front.pages.order.index', compact('products', 'priceTotal', 'packingWeight'));
    }
}
