<?php

namespace App\Http\Controllers;

use App\Models\Firm;
use App\Models\Foto;
use App\Models\Product;
use App\Models\Type;

use Bkwld\Croppa\Facades\Croppa;
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

        $types = Type::withWhereHas('productsPublic.collection.firm', fn($query) => $query->where('id', '=', $firm->id))->get();
       // $types2 = Type::withCount('products.collection')->get();
      //  $types2 = Type::withCount('products.collection')->get();
        $types2 = Type::withWhereHas('productsPublic.collection.firm', fn($query) => $query->where('id', '=', $firm->id))->withCount('productsPublic')->get();


        $breadcrumbs = [
            ['link' => route('home'), 'name' => "Главная"],
            ['link' => route('manufacture.list'), 'name' => "Производители"],
            ['name' => $firm->name]
        ];
        return view('frontend.pages.manufacture.show', compact('firm', 'types', 'breadcrumbs'));
    }
}
