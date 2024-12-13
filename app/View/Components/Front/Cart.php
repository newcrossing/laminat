<?php

namespace App\View\Components\Front;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Session;
use Illuminate\View\Component;

class Cart extends Component
{
    public function render(): View
    {

        $priceTotal = 0;
        $cart = \App\Models\Cart::where('session', Session::getId())->first();
        $products = $cart->products;
        foreach ($products as $product) {
            /** @var \App\Models\Product $product */

            $priceTotal += $product->getPriceByCount($product->pivot->count);
        }


        return view('components.front.cart', compact('products', 'priceTotal'));
    }
}
