<?php

namespace App\Http\Controllers;

use App\Models\Type;
use Illuminate\Support\Facades\Cache;

class SaleController extends Controller
{
    public function index()
    {
        $breadcrumbs = [
            ['link' => route('home'), 'name' => "Главная"],
            ['name' => " Скидки "]
        ];


        $types = Cache::remember('sale-types', now()->addHours(1), function () {
            return
                Type::whereHas('productsPublic', function ($query) {
                    $query->where('price_metr_sale', '>', 0);
                })
                    ->with(['productsPublic' => function ($query) {
                        $query->where('price_metr_sale', '>', 0);
                    }])
                    ->get();
        });


        return view('front.pages.sale.index', compact('breadcrumbs', 'types'));
    }
}
