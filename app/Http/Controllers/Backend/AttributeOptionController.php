<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAttributeOptionRequest;
use App\Http\Requests\StoreCollectionRequest;
use App\Models\Attribute;
use App\Models\AttributeOption;
use App\Models\Collection;
use App\Models\Firm;
use Illuminate\Http\Request;

class AttributeOptionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = AttributeOption::with('attribute')->get();

        $breadcrumbs = [
            ['link' => route('backend.home'), 'name' => "Главная"],
            ['name' => " Опции  "]
        ];
        return view('backend.pages.attribute-option.list', compact('items', 'breadcrumbs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $breadcrumbs = [
            ['link' => route('backend.home'), 'name' => "Главная"],
            ['link' => route('backend.attribute-option.index'), 'name' => "Опции"],
            ['name' => "Новое"]
        ];

        $attribute_option = new AttributeOption();

        return view('backend.pages.attribute-option.edit', compact(
            'attribute_option',
            'breadcrumbs',
        ));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAttributeOptionRequest $request)
    {
        $validated = $request->validated();

        $attribute_option = new AttributeOption();

        $attribute_option->fill($validated)->save();

        Attribute::find($validated['attribute_id'])->attributeOptions()->save($attribute_option);

        return redirect()->route('backend.attribute-option.edit', $attribute_option->id)->with('success', 'Сохранено.');
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
    public function edit(AttributeOption $attribute_option, Request $request)
    {
        $breadcrumbs = [
            ['link' => route('backend.home'), 'name' => "Главная"],
            ['link' => route('backend.attribute-option.index'), 'name' => "Опции"],
            ['name' => " Редактирование"]
        ];

        return view('backend.pages.attribute-option.edit', compact(
            'attribute_option',
            'breadcrumbs',
        ));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreAttributeOptionRequest $request, AttributeOption $attribute_option)
    {
        if ($request->redirect == 'delete') {
            $attribute_option->delete();
            return redirect()->route('backend.attribute-option.index')->with('success', "Опция  {$attribute_option->value} удалена");
        }
        $validated = $request->validated();

        $attribute_option->fill($validated)->save();

        Attribute::find($validated['attribute_id'])->attributeOptions()->save($attribute_option);

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
