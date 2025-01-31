<?php

namespace App\Http\Controllers\Backend;

use App\Enums\OrderStatusEnum;
use App\Http\Controllers\Controller;
use App\Models\Activity;
use App\Models\Firm;
use App\Models\Order;
use App\Models\Product;


class HomeController extends Controller
{
    public function index()
    {
        $products = Product::limit(5)->latest()->get();
        $firms = Firm::limit(5)->latest()->get();
        $orders = Order::where('status', OrderStatusEnum::NEW_1)->latest()->get();

        $topOrderProducts = Product::withCount('orders')->has('orders')->orderByDesc('orders_count')->limit(3)->get();
        $topCartProducts = Product::withCount('carts')->has('carts')->orderByDesc('carts_count')->limit(3)->get();

        return view('backend.pages.home.index', compact(
            'products',
            'firms',
            'topOrderProducts',
            'topCartProducts',
            'orders'
        ));
    }
}
