<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreFirmRequest;
use App\Http\Requests\StoreSliderRequest;
use App\Models\Firm;
use App\Models\Slider;
use App\Services\FileUploadService;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = Slider::all();

        $breadcrumbs = [
            ['link' => route('backend.home'), 'name' => "Главная"],
            ['name' => " Слайдер "]
        ];
        return view('backend.pages.slider.list', compact('items', 'breadcrumbs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $breadcrumbs = [
            ['link' => route('backend.home'), 'name' => "Главная"],
            ['link' => route('backend.slider.index'), 'name' => "Слайдер"],
            ['name' => "Новое"]
        ];

        //создаем объект чтобы было что отправить в форму.
        // Она же форма редактирования, надо что то отправить.
        $slider = new Slider();

        return view('backend.pages.slider.edit', compact(
            'slider',
            'breadcrumbs',
        ));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSliderRequest $request)
    {
        $validated = $request->validated();

        $slider = new Slider();

        $slider->fill($validated)->save();

        return redirect()->route('backend.slider.edit', $slider->id)->with('success', 'Сохранено.');
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
    public function edit(Slider $slider, Request $request)
    {
        $breadcrumbs = [
            ['link' => route('backend.home'), 'name' => "Главная"],
            ['link' => route('backend.slider.index'), 'name' => "Слайдер "],
            ['name' => " Редактирование"]
        ];

        return view('backend.pages.slider.edit', compact(
            'slider',
            'breadcrumbs',
        ));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreSliderRequest $request, Slider $slider)
    {
        if ($request->redirect == 'delete') {
            $slider->delete();
            return redirect()->route('backend.slider.index')->with('success', "Произодитель  {$slider->name} удален");
        }
        $validated = $request->validated();

        $slider->fill($validated)->save();

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
