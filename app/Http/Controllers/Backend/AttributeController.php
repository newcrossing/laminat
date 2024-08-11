<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAttributeRequest;
use App\Http\Requests\StoreFirmRequest;
use App\Models\Attribute;
use App\Models\Firm;
use App\Models\Type;
use Illuminate\Http\Request;

class AttributeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = Attribute::with('attributeOptions')->get();

        $breadcrumbs = [
            ['link' => route('backend.home'), 'name' => "Главная"],
            ['name' => " Параметры "]
        ];
        return view('backend.pages.attribute.list', compact('items', 'breadcrumbs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $breadcrumbs = [
            ['link' => route('backend.home'), 'name' => "Главная"],
            ['link' => route('backend.attribute.index'), 'name' => "Параметры"],
            ['name' => "Новое"]
        ];
        //создаем объект чтобы было что отправить в форму.
        // Она же форма редактирования, надо что то отправить.
        $attribute = new Attribute();

        return view('backend.pages.attribute.edit', compact(
            'attribute',
            'breadcrumbs',
        ));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAttributeRequest $request)
    {
        $validated = $request->validated();
        $attribute = new Attribute();
        $attribute->fill($validated)->save();
        return redirect()->route('backend.attribute.edit', $attribute->id)->with('success', 'Сохранено.');
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
    public function edit(Attribute $attribute, Request $request)
    {
        $breadcrumbs = [
            ['link' => route('backend.home'), 'name' => "Главная"],
            ['link' => route('backend.attribute.index'), 'name' => "Параметры"],
            ['name' => " Редактирование"]
        ];

        return view('backend.pages.attribute.edit', compact(
            'attribute',
            'breadcrumbs',
        ));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreAttributeRequest $request, Attribute $attribute)
    {
        if ($request->redirect == 'delete') {
            $attribute->delete();
            return redirect()->route('backend.attribute.index')->with('success', "Параметр  {$attribute->name} удален");
        }
        $validated = $request->validated();

        $attribute->fill($validated)->save();

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
