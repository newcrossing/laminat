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

    public function delete(int|null $id = null): void
    {
        if ($id) {
            // удаляю из корзины один товар
            try {
                $this->cart->products()->detach($id);
                session()->forget(keys: 'cart');
                session()->put(
                    key: 'cart',
                    value: $this->cart->products->pluck('id')->toArray(),
                );
                Log::info('Корзина: удален товар', [$id]);
                $this->js("toastr.success('Товар удален из корзины')");
            } catch (Exception  $e) {
                Log::error('Корзина: ошибка удаления из корзины', [$e]);
                $this->js("toastr.error('Ошибка удаления')");
            }
        } else {
            // очищаю корзину
            try {
                $this->cart->products()->detach();
                // очищаю сессию
                session()->forget(keys: 'cart');
                Log::info('Корзина: очищена');
                $this->js("toastr.success('Корзина очищена')");
            } catch (Exception  $e) {
                Log::error('Корзина: ошибка очищения корзины', [$e]);
                $this->js("toastr.error('Ошибка очищения корзины')");
            }
        }
        $this->render();
    }

    public function mount()
    {

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
