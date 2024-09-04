<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreInfoRequest;
use App\Models\Info;;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class InfoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $infos = Info::all();

        $breadcrumbs = [
            ['link' => route('backend.home'), 'name' => "Главная"],
            ['name' => " Информационные страницы "]
        ];
        return view('backend.pages.info.list', compact('infos', 'breadcrumbs'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $breadcrumbs = [
            ['link' => "/backend/home", 'name' => "Главная"],
            ['link' => route('backend.info.index'), 'name' => "Страницы"],
            ['name' => "Новое"]
        ];
        //создаем объект чтобы было что отправить в форму.
        // Она же форма редактирования, надо что то отправить.
        $info = new Info();

        return view('backend.pages.info.edit', compact(
            'info',
            'breadcrumbs',
        ));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreInfoRequest $request)
    {
        $validated = $request->validated();

        $info = new Info();
        $info->fill($validated)->save();

        Log::info("Добавлен инф страница: {$info->name}");

        return redirect()->route('backend.info.edit', $info->id)->with('success', 'Сохранено.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Info $info, Request $request)
    {
        $breadcrumbs = [
            ['link' => route('backend.home'), 'name' => "Главная"],
            ['link' => route('backend.info.index'), 'name' => "Страницы"],
            ['name' => " Редактирование"]
        ];

        return view('backend.pages.info.edit', compact(
            'info',
            'breadcrumbs',
        ));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreInfoRequest $request, Info $info)
    {
        $validated = $request->validated();
        $info->fill($validated)->save();

        return redirect()->back()->with('success', 'Сохранено.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
