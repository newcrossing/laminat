<?php

namespace App\View\Components\Front\Menu;

use App\Models\Firm;
use App\Models\Product;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Type extends Component
{
    public function render(): View
    {
        $types = \App\Models\Type::withWhereHas('productsPublic')
            ->withCount('productsPublic')
            ->public()
            ->get();
        $countFirm = Firm::withWhereHas('products')->count();
        $countSale = Product::where('price_metr_sale', '>', 0)->count();

        return view('components.front.menu.type', compact(
            'types',
            'countFirm',
            'countSale',
        ));


    }
}
