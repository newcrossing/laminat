<?php

namespace App\Http\Controllers;

use App\Models\Firm;
use App\Models\Product;
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

        $breadcrumbs = [
            ['link' => route('home'), 'name' => "Главная"],
            ['link' => route('manufacture.list'), 'name' => "Производители"],
            ['name' => $firm->name]
        ];
        return view('frontend.pages.manufacture.show', compact('firm', 'breadcrumbs'));
    }
}
