<?php

namespace App\Http\Controllers;

use App\Enums\OrderStatusEnum;
use App\Http\Requests\StoreOrderRequest;
use App\Mail\Contact;
use App\Mail\OrderShipped;
use App\Models\Cart;
use App\Models\Order;
use App\Models\User;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

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

        if (!count($products)) {
            return redirect()->route('cart');
        }

        // массив в письмо
        $array = array();
        $arrayOrder = [];

        // сумма заказа
        foreach ($products as $product) {
            $priceTotal += $product->getPriceByCount($product->pivot->count);
            $packingWeight += $product->packing_weight * $product->pivot->count;

            $array[] = array(
                'name' => $product->getFullName(),
                'count' => $product->pivot->count,
                'summa' => $product->getPriceByCount($product->pivot->count));
        }

        $order->fill($validated);
        $order->status = OrderStatusEnum::NEW_1;
        $order->price_total = $priceTotal;

        $order->save();
        $order->order_number = "{$order->created_at->format('Y-m')}{$order->id}";
        $order->price_delivery = $order->delivery_type->label()['price'];
        $order->save();

        $arrayOrder['numder'] = $order->order_number;
        $arrayOrder['price_delivery'] = $order->price_delivery;
        $arrayOrder['price_total'] = $order->price_total;

        // Добавляю продукты в заказ
        foreach ($products as $product) {
            $order->products()->attach($product->id, ['count' => $product->pivot->count, 'price' => $product->price_upak]);
        }

        // очищаю корзину
        $cart->products()->detach();
        session()->forget(keys: 'cart');

        Mail::to(User::adminUsers()->get())->send(new OrderShipped($validated, $array, $arrayOrder));

        Log::info("Размещен заказ {$order->order_number}");

        return view('front.pages.order.complite', compact('order'));
    }
}
