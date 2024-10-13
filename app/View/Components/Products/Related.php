<?php

namespace App\View\Components\Products;

use App\Models\Product;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Related extends Component
{
    public function __construct(
        public string $idproduct,

    )
    {
    }

    public function render(): View
    {
        // ищем похожие товары по типу и цене
        $curentProduct = Product::find($this->idproduct);
        $idType = $curentProduct->type->id;
        $price = $curentProduct->price_metr;
        $priceB = $price * (1 + 15 / 100);
        $priceM = $price * (1 - 15 / 100);

        $products = Product::where('type_id', $idType)
            ->whereBetween('price_metr', [$priceM, $priceB])
            ->public()
            ->limit(6)
            ->get();
        return view('components.products.related', compact('products'));
    }
}
