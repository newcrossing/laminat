<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreFirmRequest;
use App\Http\Requests\StoreTypeRequest;
use App\Models\Firm;
use App\Models\Type;
use Illuminate\Http\Request;

class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = Type::all();

        $breadcrumbs = [
            ['link' => route('backend.home'), 'name' => "Главная"],
            ['name' => " Типы продукции "]
        ];
        return view('backend.pages.type.list', compact('items', 'breadcrumbs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $breadcrumbs = [
            ['link' => route('backend.home'), 'name' => "Главная"],
            ['link' => route('backend.type.index'), 'name' => "Типы продукции"],
            ['name' => "Новое"]
        ];
        //создаем объект чтобы было что отправить в форму.
        // Она же форма редактирования, надо что то отправить.
        $type = new Type();

        return view('backend.pages.type.edit', compact(
            'type',
            'breadcrumbs',
        ));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTypeRequest $request)
    {
        $validated = $request->validated();

        $type = new Type();

        $type->fill($validated)->save();

        return redirect()->route('backend.type.edit', $type->id)->with('success', 'Сохранено.');
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
    public function edit(Type $type, Request $request)
    {
        $breadcrumbs = [
            ['link' => route('backend.home'), 'name' => "Главная"],
            ['link' => route('backend.type.index'), 'name' => "Типы продукции"],
            ['name' => " Редактирование"]
        ];

        return view('backend.pages.type.edit', compact(
            'type',
            'breadcrumbs',
        ));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreTypeRequest $request, Type $type)
    {
        if ($request->redirect == 'delete') {
            $type->delete();
            return redirect()->route('backend.type.index')->with('success', "Произодитель  {$type->name} удален");
        }
        $validated = $request->validated();

        $type->fill($validated)->save();

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
