<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Activity;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;




class HomeController extends Controller
{
    public function index()
    {



        return view('backend.pages.home.index'

        );
    }
}
