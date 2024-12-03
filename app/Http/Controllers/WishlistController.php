<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Support\Facades\Cookie;

class WishlistController extends Controller
{
    public function index()
    {
        $curentCookie = Cookie::get('wishlist');
        $arrCookie = array_filter(explode(",", $curentCookie));

        $products = Product::findMany($arrCookie);

        $breadcrumbs = [
            ['link' => route('home'), 'name' => "Главная"],
            ['name' => " Избранное "]
        ];
        return view('front.pages.wishlist.index',
            compact('breadcrumbs', 'arrCookie', 'products'));
    }
}
