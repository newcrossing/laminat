<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Activity;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class UserController extends Controller
{
    public function index()
    {

        $users = User::all();
        $breadcrumbs = [
            ['link' => "/admin/", 'name' => "Главная"],
            ['name' => " Пользователи"]
        ];
        return view('backend.pages.user.index', compact('users', 'breadcrumbs'));
    }
}
