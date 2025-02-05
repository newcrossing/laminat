<?php

namespace App\Http\Controllers;

use App\Models\Document;
use App\Models\Post;
use App\Models\Product;

class SitemapController extends Controller
{
    public function generate()
    {
        $products = Product::public()->latest()->get();


        return response()
            ->view('sitemap', compact('products'))
            ->header('Content-Type', 'text/xml');
    }
}
