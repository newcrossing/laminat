<?php

namespace App\Http\Controllers;

use App\Models\Firm;
use App\Models\Type;
use Illuminate\Database\Eloquent\Builder;

class ManufactureController extends Controller
{
    public function list()
    {
        $breadcrumbs = [
            ['link' => route('home'), 'name' => "Главная"],
            ['name' => " Производители "]
        ];

        $firms = Firm::whereHas('collections.productsPublic')
            ->withCount(['collections', 'products' => function (Builder $query) {
                $query->where('products.public', '=', 1);
            }])
            ->public()
            ->get();
        return view('frontend.pages.manufacture.index', compact('firms', 'breadcrumbs'));
    }

    public function show($slug)
    {
        $firm = Firm::where('slug', $slug)->firstOrFail();

        $types = Type::whereHas('productsPublic.collection.firm', function ($query) use ($firm) {
            $query->where('id', $firm->id);
        })
            ->with(['productsPublic' => function ($query) use ($firm) {
                $query->whereHas('collection.firm', function ($query) use ($firm) {
                    $query->where('id', $firm->id);
                });
            }])
            ->get();

        $breadcrumbs = [
            ['link' => route('home'), 'name' => "Главная"],
            ['link' => route('manufacture.list'), 'name' => "Производители"],
            ['name' => $firm->name]
        ];

        return view('frontend.pages.manufacture.show', compact('firm', 'types', 'breadcrumbs'));
    }
}
