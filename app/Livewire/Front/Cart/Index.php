<?php

namespace App\Livewire\Front\Cart;

use App\Models\Cart;
use Illuminate\Support\Facades\Log;
use Livewire\Component;

class Index extends Component
{
    public $products;
    public $priceTotal;
    public $packingWeight;
    public $cart;

    public function countChange($id, $p, $val = null)
    {
        $count = $this->cart->products()->where('products.id', $id)->first()->pivot->count;
        if ($p === 'plus') {
            $count++;
        } elseif ($p === 'minus') {
            $count--;
        } elseif ($p === 'value') {
            $count = $val;
        }
        $this->cart->products()->updateExistingPivot($id, ['count' => $count]);

        session()->forget(keys: 'cart');
        session()->put(
            key: 'cart',
            value: $this->cart->products->pluck('id')->toArray(),
        );

        Log::info('Корзина: удален товар', [$id]);
        $this->render();
    }

    public function delete($id = null)
    {
        if ($id) {
            // удаляю из корзины
            $this->cart->products()->detach($id);

            session()->forget(keys: 'cart');
            session()->put(
                key: 'cart',
                value: $this->cart->products->pluck('id')->toArray(),
            );

            Log::info('Корзина: удален товар', [$id]);
        } else {

            $this->cart->products()->detach();

            // очищаю сессию
            session()->forget(keys: 'cart');

            Log::info('Корзина: очищена');
        }
       // $this->dispatch('alert',message: 'Товар удален из корзины',header:'Успешно');
        $this->js("Toasty.showToast('Успешно','Товар удален из корзины', '<i class=\"fas fa-exclamation-circle\"></i>', 3000)");

        $this->render();
    }

    public function mount()
    {
//        $cart = Cart::getCart();
//        $this->products = $cart->products;
//
//        foreach ($this->products as $product) {
//            $this->priceTotal += $product->getPriceByCount($product->pivot->count);
//            $this->packingWeight += $product->packing_weight * $product->pivot->count;
//        }

    }

    public function render()
    {
        $this->priceTotal = 0;
        $this->packingWeight = 0;

        $this->cart = Cart::getCart();
        $this->products = $this->cart->products;

        foreach ($this->products as $product) {
            $this->priceTotal += $product->getPriceByCount($product->pivot->count);
            $this->packingWeight += $product->packing_weight * $product->pivot->count;
        }
        return view('livewire.front.cart.index');
    }
}
