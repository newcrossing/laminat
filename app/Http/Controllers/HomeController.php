<?php

namespace App\Http\Controllers;

use App\Models\Firm;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

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
    public function index(Request $request)
    {
        $firms = Firm::whereHas('collections.productsPublic')
            ->withCount(['collections', 'products' => function (\Illuminate\Database\Eloquent\Builder $query) {
                $query->where('products.public', '=', 1);
            }])
            ->public()
            ->get();

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

        //  dump($request->cookie('wishlist'));
        // dump($request->header('cookie'));
        $data = request()->header('header_name'); // array list of headers
        // $data['field_name'];
        // Cookie::queue('rrr', '30', 20);
       //dump(Cookie::get('wishlist'));
        //return response('text')->cookie('name', 'value', 10);
       // $cookie = cookie('name', 'value', 1000);

        //return response('Hello World')->cookie($cookie);

        return view('front.pages.home.index', compact('types', 'firms'));
    }
}
