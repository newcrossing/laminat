<?php

namespace App\Http\Controllers;

use App\Models\Info;

class InfoController extends Controller
{
    public function show($s)
    {
        $info = Info::where('slug', $s)->where('public', 1)->firstOrFail();

        $breadcrumbs = [
            ['link' => route('home'), 'name' => "Главная"],
            ['name' => $info->name]
        ];

        return view('front.pages.info.index', compact('info', 'breadcrumbs'));
    }


}
