<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Activity;
use App\Models\Firm;
use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;




class HomeController extends Controller
{
    public function index()
    {
    $products  = Product::limit(5)->latest()->get();
    $firms  = Firm::limit(5)->latest()->get();


        return view('backend.pages.home.index', compact(
            'products',
            'firms'
            )

        );
    }
}
