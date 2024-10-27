<?php

namespace App\Http\Controllers;

use App\Models\Attribute;
use App\Models\Collection;
use App\Models\Firm;
use App\Models\Product;
use App\Models\Type;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class TypeController extends Controller
{
    public function index(Request $request, $slug_type, $slug_firm = null, $slug_collection = null,)
    {
        $type = Type::where('slug', $slug_type)->withCount('productsPublic')->firstOrFail();

        if ($slug_firm) {
            // проверка на наличие фирмы с товаром в данном типе
            $selectFirm = Firm::where('slug', $slug_firm)
                ->withCount(['products' => function (Builder $query) use ($type) {
                    $query->where('type_id', '=', $type->id);
                }])
                // ->with()
                ->withMin('products', 'price_metr')
                ->withMax('products', 'price_metr')
                ->firstOrFail();

            if (!$selectFirm->products_count) {
                abort(404);
            }
            // dump($selectFirm);

            if ($slug_collection) {
                // проверка на наличие коллекции  с товаром в данном типе и фирме
                $selectCollection = Collection::where('slug', $slug_collection)
                    ->whereHas('firm', fn($query) => $query->where('slug', '=', $selectFirm->slug))
                    ->withCount(['products' => function (Builder $query) use ($type) {
                        $query->where('type_id', '=', $type->id);
                    }])
                    ->withMin('products', 'price_metr')
                    ->withMax('products', 'price_metr')
                    ->firstOrFail();

                if (!$selectCollection->products_count) {
                    abort(404);
                }
            }


        }

        // запрос на выбранные продукты
        $products = Product::query()
            ->withWhereHas('type', fn($query) => $query->where('slug', '=', $slug_type))
            ->with('collection.firm')
            ->public()
            ->when(($request->have == '1'), function ($q) {
                return $q->where('have_sklad', 1);
            })
            ->when($request->sorting == 'pricey', function ($q) {
                return $q->orderByDesc('price_metr');
            })
            ->when($request->sorting == 'cheaply', function ($q) {
                return $q->orderBy('price_metr');
            })
            // если указали опцию для отбора
            ->when(!empty($request->options), function ($q) use ($request) {
                return $q->whereHas('attributeOptions', fn($query) => $query->whereIn('id', $request->options));
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
        ];
        if ($slug_firm) {
            $breadcrumbs[] = ['link' => route('type.index', $type->slug), 'name' => $type->name];
            if ($slug_collection){
                // если есть коллекция
                $breadcrumbs[] = ['link' => route('type.index', [$type->slug,$selectFirm->slug]), 'name' => $selectFirm->name];
                $breadcrumbs[] = [ 'name' => $selectCollection->name];
            } else{
                $breadcrumbs[] = [ 'name' => $selectFirm->name];
            }
        } else {
            $breadcrumbs[] = [ 'name' => $type->name];
        }


        $selectFirm = $selectFirm ?? null;
        $selectCollection = $selectCollection ?? null;

        return view('frontend.pages.type.index', compact(
                'products',
                'type',
                'firms',
                'attributes',
                'selectFirm',
                'selectCollection',
                'breadcrumbs')
        );
    }

}
