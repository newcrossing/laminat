<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Bkwld\Croppa\Facades\Croppa;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function list()
    {
        $products = Product::where('public', '1')->get();
        // dd(Croppa::url('storage/11.jpg',220,300));
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
            ['link' => route('home'), 'name' => "Главная"],
            ['link' => $product->type->slug, 'name' => $product->type->name],
            ['link' => $product->type->slug.'/'.$product->collection->firm->slug, 'name' => $product->collection->firm->name],
            ['link' => $product->type->slug.'/'.$product->collection->firm->slug.'/'.$product->collection->slug, 'name' => $product->collection->name],
            ['name' => $product->name]
        ];
     //   return view('frontend.pages.product.index', compact('product', 'breadcrumbs'));
        return view('front.pages.product.show', compact('product', 'breadcrumbs'));
    }
}
