<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Log;

class AjaxController extends Controller
{
    public function wishlist(Request $request)
    {
        $set = $request->set;
        $id = $request->id;
        $curentCookie = Cookie::get('wishlist');
        $arrCookie = array_filter(explode(",", $curentCookie));

        // если нет в листе
        if (!in_array($id, $arrCookie)) {
            $arrCookie[] = $id;
        } else {
            unset($arrCookie[array_search($id, $arrCookie)]);
        }

        return response(count($arrCookie))->withCookie(cookie()->forever('wishlist', implode(',', $arrCookie)));
    }

    public function cart(Request $request)
    {
        $id = (int) $request->id;
        $count = $request->count;
        $type = $request->type;

        switch ($type) {
            case 'clear':
                // очищаю корзину
                $cart = Cart::getCart();
                $cart->products()->detach();

                // очищаю сессию
                session()->forget(keys: 'cart');

                Log::info('Корзина: очищена');
                return response(['result' => 'ok']);

            case 'delete':
                // удаляю из корзины
                $cart = Cart::getCart();
                $cart->products()->detach($id);

                session()->forget(keys: 'cart');
                session()->put(
                    key: 'cart',
                    value: $cart->products->pluck('id')->toArray(),
                );

                Log::info('Корзина: удален товар', [$id]);
                return response(['result' => 'ok', 'count' => $cart->products->count()]);
            case 'change':
                $cart = Cart::getCart();

                $cart->products()->detach($id);
                $cart->products()->attach($id, ['count' => $count]);

                session()->forget(keys: 'cart');
                session()->put(
                    key: 'cart',
                    value: $cart->products->pluck('id')->toArray(),
                );

                return  view('front.pages.cart.moduls.total-price' );

        }


        $cart = Cart::getCart();

        $cart->products()->detach($id);
        $cart->products()->attach($id, ['count' => $count]);

        session()->forget(keys: 'cart');
        session()->put(
            key: 'cart',
            value: $cart->products->pluck('id')->toArray(),
        );

        Log::info('Корзина: добавление', [$cart, $id]);

        $data = [
            "result" => "ok",
            "count" => $cart->products->count(),
        ];
        return response()->json($data, 200);


      //  return response($cart->products->count());
    }
}
