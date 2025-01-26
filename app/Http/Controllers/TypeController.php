<?php

namespace App\Http\Controllers;

use App\Models\Attribute;
use App\Models\Collection;
use App\Models\Firm;
use App\Models\Product;
use App\Models\Type;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class TypeController extends Controller
{
    public function index(Request $request, $slug_type, $slug_firm = null, $slug_collection = null,)
    {
        $type = Type::where('slug', $slug_type)->withCount('productsPublic')->firstOrFail();
        $selectFirm = null;
        $selectCollection = null;

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
        $productsNoFilter = Product::query()
            ->withWhereHas('type', fn($query) => $query->where('slug', '=', $slug_type))
            ->public()

            // если указан производитель
            ->when($slug_firm, function ($q) use ($selectFirm) {
                $q->whereHas('firm', fn($query) => $query->where('firms.id', '=', $selectFirm->id));
            })

            // если указана коллекция
            ->when($slug_collection, function ($q) use ($selectCollection) {
                $q->whereHas('collection', fn($query) => $query->where('collections.id', '=', $selectCollection->id));
            })
            ->get();



        // запрос на выбранные продукты
        $products = Product::query()
            ->withWhereHas('type', fn($query) => $query->where('slug', '=', $slug_type))
            ->with('collection.firm')
            ->public()
            ->when($request->onsubmit, function ($q) use ($request) {
                return $q->whereBetween('price_metr', [$request->price_min, $request->price_max]);
            })
            ->when(($request->have == '1'), function ($q) {
                return $q->where('have_sklad', 1);
            })
            ->when($request->sorting == 'pricey', function ($q) {
                return $q->orderByDesc('price_metr');
            })
            ->when($request->sorting == 'cheaply', function ($q) {
                return $q->orderBy('price_metr');
            })

            // если указан производитель
            ->when($slug_firm, function ($q) use ($selectFirm) {
                $q->whereHas('firm', fn($query) => $query->where('firms.id', '=', $selectFirm->id));
            })

            // если указана коллекция
            ->when($slug_collection, function ($q) use ($selectCollection) {
                $q->whereHas('collection', fn($query) => $query->where('collections.id', '=', $selectCollection->id));
            })

            // если указали опцию для отбора
            ->when(!empty($request->options), function ($q) use ($request) {
                foreach ($request->options as $key => $value) {
                    $q = $q->whereHas('attributeOptions.attribute', fn($query) => $query->whereIn('id', [$key]));
                    $q = $q->whereHas('attributeOptions', fn($query) => $query->whereIn('id', $value));
                }
                return $q;

            })
            ->paginate(Product::COUNT_OF_PAGINATION)
            ->withQueryString();
//dump($products->min('price_metr'));

        // производители в выбранном типе
        $firms = Firm::whereHas('products', fn($query) => $query->where('type_id', '=', $type->id))
            ->withCount(['products' => function (Builder $query) use ($type) {
                $query->whereHas('type', fn($query) => $query->where('id', '=', $type->id));
            }])
            ->orderBy('name')
            ->get();

        // аттрибуты  в выбранном
        $attributes = Attribute::whereHas('attributeOptions.products.type', fn($query) => $query->where('id', '=', $type->id))
            ->when($selectFirm, function ($q) use ($selectFirm) {
                // если указана фирма
                $q->whereHas('attributeOptions.products.firm', fn($query) => $query->where('firms.id', '=', $selectFirm->id));
            })
            // ->whereHas('attributeOptions.products.firm', fn($query) => $query->where('firms.id', '=', $selectFirm->id))
            // ->whereHas('attributeOptions.products.firm', fn($query) => $query->where('firms.id', '=', $selectFirm->id))
            ->with(['attributeOptions' => function ($query) use ($type, $selectFirm) {
                $query->whereHas('products.type', function ($query) use ($type, $selectFirm) {
                    $query->where('id', '=', $type->id);
                })->when($selectFirm, function ($q) use ($selectFirm) {
                    // если указана фирма
                    $q->whereHas('products.firm', fn($query) => $query->where('firms.id', '=', $selectFirm->id));
                })
                    ->withCount(['products' => function (Builder $query) use ($type, $selectFirm) {
                        $query
                            ->whereHas('type', fn($query) => $query->where('id', '=', $type->id))
                            ->when($selectFirm, function ($q) use ($selectFirm) {
                                $q->whereHas('firm', fn($query) => $query->where('firms.id', '=', $selectFirm->id));
                            });
                    }]);
            }])
            // если выбран производитель

            ->get();
        //   dump($attributes);


        $breadcrumbs = [
            ['link' => route('home'), 'name' => "Главная"],
        ];
        $meta['title']="{$type->name} - цены, каталог | Приобрести ламинат в интернет-магазине «Пол России»";
        $meta['description']="В интернет-магазине «Пол России» вы можете приобрести качественный {$type->name} по выгодным ценам. 
        У нас самый большой выбор напольных покрытий. Приезжайте!";

        if ($slug_firm) {
            $breadcrumbs[] = ['link' => route('type.index', $type->slug), 'name' => $type->name];

            $meta['title']="{$type->name} {$selectFirm->name} | Купить в интернет-магазине";
            $meta['description']="{$type->name} {$selectFirm->name} — каталог с фотографиями и ценами.
В интернет-магазине «Пол России» вы можете выбрать и купить {$type->name} {$selectFirm->name}. У нас самый большой выбор  напольных покрытий. Приезжайте!";

            if ($slug_collection) {
                // если есть коллекция
                $breadcrumbs[] = ['link' => route('type.index', [$type->slug, $selectFirm->slug]), 'name' => $selectFirm->name];
                $breadcrumbs[] = ['name' => $selectCollection->name];

                $meta['title']="{$type->name} {$selectFirm->name} {$selectCollection->name} | Купить в интернет-магазине";
                $meta['description']="{$type->name} {$selectFirm->name} {$selectCollection->name}— каталог с фотографиями и ценами.
В интернет-магазине «Пол России» вы можете выбрать и купить {$type->name} {$selectFirm->name} {$selectCollection->name}. У нас самый большой выбор  напольных покрытий. Приезжайте!";

            } else {
                $breadcrumbs[] = ['name' => $selectFirm->name];
            }
        } else {
            $breadcrumbs[] = ['name' => $type->name];
        }


        $selectFirm = $selectFirm ?? null;
        $selectCollection = $selectCollection ?? null;
        return view('front.pages.type.index', compact(
                'products',
                'productsNoFilter',
                'type',
                'firms',
                'attributes',
                'selectFirm',
                'selectCollection',
                'meta',
                'breadcrumbs')
        );
    }

}
