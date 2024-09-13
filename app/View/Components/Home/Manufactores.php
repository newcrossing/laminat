<?php

namespace App\View\Components\Home;

use App\Models\Firm;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use Illuminate\Database\Eloquent\Builder;

class Manufactores extends Component
{
    public function render(): View
    {
        //$firms = Firm::with('collections')->withCount('products')->limit(4)->get();
        $firms = Firm::with('collections')->withCount([
            'products',
            'products as sale_products_count' => function (Builder $query) {
                $query->where('price_metr_sale', '<>', '');
            },
        ])->limit(4)->get();
        return view('components.home.manufactores', compact('firms'));
    }
}
