<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use App\Mail\Contact;
use App\Models\Info;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class InfoController extends Controller
{
    public function show($s)
    {
        $info = Info::where('slug', $s)->firstOrFail();

        $breadcrumbs = [
            ['link' => route('home'), 'name' => "Главная"],
            ['name' => $info->name]
        ];
        $view = '';

        switch($s)
        {
            case 'contact':
                $view = 'front.pages.info.contact';
                break;

            default:
                $view = 'front.pages.info.index';
                break;

        }
        return view($view, compact('info', 'breadcrumbs'));
    }




}
