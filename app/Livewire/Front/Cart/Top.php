<?php

namespace App\Livewire\Front\Cart;

use App\Models\Cart;
use Illuminate\Support\Facades\Log;
use Livewire\Component;

class Top extends Component
{

    public $cart;
    public $countCart;
    public $priceTotal;
    public $products;

    protected $listeners = [
        'cart-add' => 'cartAdd',
        'cart-update' => 'cartUpdate',
    ];

    public function cartUpdate()
    {
        $this->render();

    }

    public function cartAdd(int $productID, int $count = 1)
    {
        $this->cart = Cart::getCart();

        $this->cart->products()->detach($productID);
        $this->cart->products()->attach($productID, ['count' => $count]);

        Log::info('Избранное: товар добавлен в избранное', ['ID=' => $productID, 'Количество=' => $count]);
        $this->js("toastr.success('Товар добавлен в корзину')");
    }

    public function render()
    {
        $this->priceTotal = 0;

        $this->countCart = Cart::getCartProductsCount();

        if ($this->countCart) {
            $this->cart = Cart::getCart();
            $this->products = $this->cart->products;
            foreach ($this->products as $product) {
                /** @var \App\Models\Product $product */

                $this->priceTotal += $product->getPriceByCount($product->pivot->count);
            }
        } else {
            $this->products = [];
        }


        return view('livewire.front.cart.top');
    }
}
