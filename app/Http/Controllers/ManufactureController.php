<?php

namespace App\Http\Controllers;

use App\Models\Firm;
use App\Models\Product;
use App\Models\Type;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class ManufactureController extends Controller
{
    public function list()
    {
        $firms = Firm::with('collections')->where('public', '1')->get();

        $breadcrumbs = [
            ['link' => route('home'), 'name' => "Главная"],
            ['name' => " Производители "]
        ];
        return view('frontend.pages.manufacture.index', compact('firms', 'breadcrumbs'));
    }

    public function show($slug)
    {
        $firm = Firm::where('slug', $slug)->firstOrFail();


        // получаю все Типы выполнял
        $types = Type::withWhereHas('productsPublic.collectionPublic.firm', fn($query) => $query->where('id', '=', $firm->id))->get();
//        foreach ($Type as $t) {
//            print "{$t->name} <br>";
//            foreach ($t->productsPublic as $product) {
//                print "-{$product->name} - {$product->collection->name} - {$product->collection->firm->name}  <br>";
//
//            }
//        }


        $breadcrumbs = [
            ['link' => route('home'), 'name' => "Главная"],
            ['link' => route('manufacture.list'), 'name' => "Производители"],
            ['name' => $firm->name]
        ];
        return view('frontend.pages.manufacture.show', compact('firm', 'types', 'breadcrumbs'));
    }
}
