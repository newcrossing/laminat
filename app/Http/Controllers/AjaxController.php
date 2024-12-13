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
        $id = $request->id;
        $count = $request->count;
        $type = $request->type;

        $cart = Cart::firstOrCreate(['session' => session()->getId()]);

        $cart->products()->detach($id);
        $cart->products()->attach($id, ['count' => $count]);

        Log::info('Доавление в корзину', [$cart, $id]);

        return response(['result' => 'ok', 'count' => $cart->products->count()]);
    }
}
