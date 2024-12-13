<?php

namespace App\Http\Controllers;

use App\Models\Product;

use http\Client\Request;
use Illuminate\Support\Facades\Crypt;

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
            ['link' => route('home'), 'name' => "Главная"],
            ['link' => $product->type->slug, 'name' => $product->type->name],
            ['link' => $product->type->slug . '/' . $product->collection->firm->slug, 'name' => $product->collection->firm->name],
            ['link' => $product->type->slug . '/' . $product->collection->firm->slug . '/' . $product->collection->slug, 'name' => $product->collection->name],
            ['name' => $product->name]
        ];


        $co = collect([['id' => 1, 'count' => 2]]);
        //$co->push(['id'=>2,'count'=>3]);
        // dump($co->where('id',2));
        // $t = $co->toJson();

        //$dataCollection = collect(json_decode($t, true));
        // dd(($dataCollection));
        //dd(collect([['id' => 1, 'count' => 2]])->toJson());
        // dd(array(Cookie::get('cart')));
        //   return response(1)->withCookie(cookie()->forever('cart2', $numbers->toJson()));
        // dd($numbers->toArray());
        //$cart  = Cart::firstOrCreate(['session' => session()->getId()]);
        //dump($cart->products->count());


        //   return view('frontend.pages.product.index', compact('product', 'breadcrumbs'));
        return view('front.pages.product.show', compact('product', 'breadcrumbs'));
    }
}
