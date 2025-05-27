<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBannerRequest;
use App\Models\Banner;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $breadcrumbs = [
            ['link' => route('backend.home'), 'name' => "Главная"],
            ['name' => " Баннеры "]
        ];
        return view('backend.pages.banner.list', compact('breadcrumbs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $breadcrumbs = [
            ['link' => route('backend.home'), 'name' => "Главная"],
            ['link' => route('backend.banner.index'), 'name' => "Баннер"],
            ['name' => "Новый"]
        ];

        // Cоздаем объект чтобы было что отправить в форму.
        // Она же форма редактирования, надо что-то отправить.
        $banner = new Banner();

        return view('backend.pages.banner.edit', compact('banner', 'breadcrumbs',));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBannerRequest $request)
    {
        $validated = $request->validated();

        $banner = new Banner();
        $banner->fill($validated)->save();

        return redirect()->route('backend.banner.edit', $banner)->with('success', 'Сохранено.');
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
    public function edit(Banner $banner, Request $request)
    {
        $breadcrumbs = [
            ['link' => route('backend.home'), 'name' => "Главная"],
            ['link' => route('backend.banner.index'), 'name' => "Баннер  "],
            ['name' => " Редактирование"]
        ];

        return view('backend.pages.banner.edit', compact(
            'banner',
            'breadcrumbs',
        ));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(StoreBannerRequest $request, Banner $banner)
    {
        if ($request->redirect == 'delete') {
            $banner->delete();
            return redirect()->route('backend.banner.index')->with('success', "Баннер   {$banner->name} удален");
        }
        $validated = $request->validated();

        $banner->fill($validated)->save();

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
