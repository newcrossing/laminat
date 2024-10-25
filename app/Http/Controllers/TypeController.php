<?php

namespace App\Http\Controllers;

use App\Models\Attribute;
use App\Models\Firm;
use App\Models\Product;
use App\Models\Type;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class TypeController extends Controller
{
    public function index($slug_type, Request $request)
    {
        $type = Type::where('slug', $slug_type)->withCount('productsPublic')->firstOrFail();

        // запрос на выбранные продукты
        $products = Product::query()
            ->withWhereHas('type', fn($query) => $query->where('slug', '=', $slug_type))
            ->with('collection.firm')
            ->public()
            ->when((request('have') == '1'), function ($q) {
                return $q->where('have_sklad', 1);
            })
            ->when(request('sorting') == 'pricey', function ($q) {
                return $q->orderByDesc('price_metr');
            })
            ->when(request('sorting') == 'cheaply', function ($q) {
                return $q->orderBy('price_metr');
            })
            ->paginate(Product::COUNT_OF_PAGINATION)
            ->withQueryString();


        // производители в выбранном типе
        $firms = Firm::whereHas('products', fn($query) => $query->where('type_id', '=', $type->id))
            ->withCount(['products' => function (Builder $query) use ($type) {
                $query->whereHas('type', fn($query) => $query->where('id', '=', $type->id));
            }])
            ->orderBy('name')
            ->get();

        // производители в выбранном типе
        $attributes = Attribute::whereHas('attributeOptions.products.type', fn($query) => $query->where('id', '=', $type->id))
            ->with(['attributeOptions' => function ($query) use ($type) {
                $query->whereHas('products.type', function ($query) use ($type) {
                    $query->where('id', '=', $type->id);
                })->withCount(['products' => function (Builder $query) use ($type) {
                    $query->whereHas('type', fn($query) => $query->where('id', '=', $type->id));
                }]);
            }])
            ->get();


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
