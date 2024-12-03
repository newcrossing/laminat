<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class AjaxController extends Controller
{
    public function wishlist(Request $request)
    {
        $set = $request->set;
        $id = $request->id;
        $curentCookie = Cookie::get('wishlist');
        $arrCookie = array_filter(explode(",", $curentCookie));

        // добавить в лист

        // если нет в листе
        if (!in_array($id, $arrCookie)) {
            $arrCookie[] = $id;
        } else {
            unset($arrCookie[array_search($id, $arrCookie)]);
        }

        return response(count($arrCookie))->withCookie(cookie()->forever('wishlist', implode(',', $arrCookie)));
        //return response($k);
    }
}
