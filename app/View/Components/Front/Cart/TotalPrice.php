<?php

namespace App\View\Components\Front\Cart;

use App\Models\Cart;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class TotalPrice extends Component
{
    public function render(): View
    {
        $priceTotal = 0;

        // Общий вес заказа
        $packingWeight = 0;

        $cart = Cart::getCart();

        $products = $cart->products;

        foreach ($products as $product) {
            $priceTotal += $product->getPriceByCount($product->pivot->count);
            $packingWeight += $product->packing_weight * $product->pivot->count;
        }

        return view('components.front.cart.total-price', compact('priceTotal', 'packingWeight', 'products'));
    }
}
