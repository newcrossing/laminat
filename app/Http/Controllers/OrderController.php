<?php

namespace App\Http\Controllers;

use App\Enums\OrderDeliveryEnum;
use App\Http\Requests\StoreOrderRequest;
use App\Models\Cart;
use App\Models\Order;
use Illuminate\Support\Facades\Log;

class OrderController extends Controller
{
    public function index()
    {
        $priceTotal = 0;

        // Общий вес заказа
        $packingWeight = 0;



        $cart = Cart::getCart();
        $products = $cart->products;

        if (!count($products)) {
            return redirect()->route('cart');
        }

        foreach ($products as $product) {
            $priceTotal += $product->getPriceByCount($product->pivot->count);
            $packingWeight += $product->packing_weight * $product->pivot->count;
        }

        return view('front.pages.order.index', compact('products', 'priceTotal', 'packingWeight'));
    }

    public function create(StoreOrderRequest $request)
    {
        $validated = $request->validated();
        $priceTotal = 0;
        $packingWeight = 0;

        $order = new Order();
        $cart = Cart::getCart();
        $products = $cart->products;

        if (!count($products)){
            return redirect()->route('cart' );
        }


        // сумма заказа
        foreach ($products as $product) {
            $priceTotal += $product->getPriceByCount($product->pivot->count);
            $packingWeight += $product->packing_weight * $product->pivot->count;
        }

        $order->fill($validated);
        $order->status = "Принят";
        $order->price_total = $priceTotal;

        $order->save();
        $order->order_number = "{$order->created_at->format('Ym')}{$order->id}";
        $order->price_delivery = $order->delivery_type->label()['price'];
        $order->save();

        // Добавляю продукты в заказ
        foreach ($products as $product) {
            $order->products()->attach($product->id, ['count' => $product->pivot->count, 'price' => $product->price_upak]);
        }


        // очищаю корзину
        $cart->products()->detach();
        session()->forget(keys: 'cart');

        Log::info("Размещен заказ");

        return view('front.pages.order.complite', compact('order'));
    }
}
