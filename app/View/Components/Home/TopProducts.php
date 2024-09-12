<?php

namespace App\View\Components\Home;

use App\Models\Product;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class TopProducts extends Component
{


    public function render(): View
    {
        $products = Product::inRandomOrder()->where('price_metr_sale', '<>', '')->limit(2)->get();

        return view('components.home.top-products', compact('products'));
    }
}
