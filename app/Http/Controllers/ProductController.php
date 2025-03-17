<?php

namespace App\Http\Controllers;

use App\Models\Product;

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
        $product = Product::with(['firm','type','collection'])->where('slug', $slug)->public()->firstOrFail();

        $breadcrumbs = [
            ['link' => route('home'), 'name' => "Главная"],
            ['link' => $product->type->slug, 'name' => $product->type->name],
            ['link' => $product->type->slug . '/' . $product->collection->firm->slug, 'name' => $product->collection->firm->name],
            ['link' => $product->type->slug . '/' . $product->collection->firm->slug . '/' . $product->collection->slug, 'name' => $product->collection->name],
            ['name' => $product->name]
        ];

        return view('front.pages.product.show', compact('product', 'breadcrumbs'));
    }
}
