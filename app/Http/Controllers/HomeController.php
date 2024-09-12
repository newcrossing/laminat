<?php

namespace App\Http\Controllers;

use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Contracts\Database\Eloquent\Builder;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
         //$types = Type::with('productsPublic')->has('productsPublic')->get();
         $types = Type::with('productsPublic')->has('productsPublic')->get();
        //   $types = Type::with('products', fn(   $query) => $query->take(3))->get();
//        $types = Type::query()
//            ->with([
//                'products' => fn(Builder $query): Builder => $query->limit(7),
//            ])
//            ->has('productsPublic')
//            ->get();
//dd($types);

        return view('frontend.pages.home.index', compact('types'));
    }
}
