<?php

namespace App\Http\Controllers;

class SaleController extends Controller
{
    public function index()
    {
        $breadcrumbs = [
            ['link' => route('home'), 'name' => "Главная"],
            ['name' => " Скидки "]
        ];
        return view('front.pages.wishlist.index', compact('breadcrumbs'));
    }
}
