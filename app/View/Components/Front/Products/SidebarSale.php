<?php

namespace App\View\Components\Front\Products;

use App\Models\Product;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class SidebarSale extends Component
{
    public function render(): View
    {
        $products  = Product::where('price_metr_sale','>',0)->public()->limit(4)->get();
        return view('components.front.products.sidebar-sale', compact('products'));
    }
}
