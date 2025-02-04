<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Activity;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    public function index()
    {
        $users = User::with('roles')->get();
        $breadcrumbs = [
            ['link' => "/admin/", 'name' => "Главная"],
            ['name' => " Пользователи"]
        ];
        return view('backend.pages.user.index', compact('users', 'breadcrumbs'));
    }

    public function edit(User $user)
    {
        $breadcrumbs = [
            ['link' => "/", 'name' => "Главная"],
            ['link' => route('backend.user.index'), 'name' => "Пользователи"],
            ['name' => " Редактировать"]
        ];

        return view('backend.pages.user.edit', compact('user', 'breadcrumbs'));
    }

    public function update(Request $request, User $user)
    {

        $request->validate([
            'name' => 'required|string|max:50|min:3',
            'email' => 'required|email',
        ], [

        ]);


        if ($request['password']) {
            $user->password = Hash::make($request['password']);
            $user->save();
        }

        $user->fill($request->only(['name', 'email']))->save();


        return redirect()->back()->with('success', 'Сохранено');

    }
}
