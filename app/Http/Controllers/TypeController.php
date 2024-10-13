<?php

namespace App\Http\Controllers;

use App\Models\Attribute;
use App\Models\AttributeOption;
use App\Models\Firm;
use App\Models\Product;
use App\Models\Type;
use Illuminate\Http\Request;

class TypeController extends Controller
{
    public function index($slug_type, Request $request)
    {
        $type = Type::where('slug', $slug_type)->withCount('productsPublic')->firstOrFail();


        $query = Product::query();
        $query->withWhereHas('type', fn($query) => $query->where('slug', '=', $slug_type))->with('collection.firm')->public();

        $query->when((request('have') == '1'), function ($q) {
            return $q->where('have_sklad', 1);
        });

        $query->when(request('sorting') == 'pricey', function ($q) {
            return $q->orderByDesc('price_metr');
        });

        $query->when(request('sorting') == 'cheaply', function ($q) {
            return $q->orderBy('price_metr');
        });

        $products = $query->paginate(Product::COUNT_OF_PAGINATION)->withQueryString();

        $firms = Firm::withWhereHas('products', fn($query) => $query->where('type_id', '=', $type->id))->withCount('products')->orderBy('name')->get();

        $attributes = Attribute::withWhereHas('attributeOptions.products',fn($query) => $query->where('id', '=', 14))->get();
     //   $attributesO = AttributeOption::withWhereHas('products')->get();

        //dd($attributes);
        $breadcrumbs = [
            ['link' => route('home'), 'name' => "Главная"],
            ['name' => $type->name]
        ];
        return view('frontend.pages.type.index', compact(
                'products',
                'type',
                'firms',
                'attributes',
                'breadcrumbs')
        );
    }

}
