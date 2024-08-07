<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function list()
    {
        $products = Product::where('public', '1')->get();

        $breadcrumbs = [
            ['link' => "/backend/", 'name' => "Главная"],
            ['name' => " Продукция "]
        ];
        return view('frontend.pages.categoty.index', compact('products', 'breadcrumbs'));
    }

    public function show($slug)
    {

        $product = Product::where('slug', $slug)->firstOrFail();


        $breadcrumbs = [
            ['link' => "/backend/", 'name' => "Главная"],
            ['name' => " Продукция "]
        ];
        return view('frontend.pages.product.index', compact('product', 'breadcrumbs'));
    }
}
