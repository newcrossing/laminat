<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCollectionRequest;
use App\Http\Requests\StoreFirmRequest;
use App\Models\Collection;
use App\Models\Firm;
use App\Models\Type;
use Illuminate\Http\Request;

class CollectionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = Collection::with('firm')->get();

        $breadcrumbs = [
            ['link' => route('backend.home'), 'name' => "Главная"],
            ['name' => " Коллекции "]
        ];
        return view('backend.pages.collection.list', compact('items', 'breadcrumbs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $breadcrumbs = [
            ['link' => route('backend.home'), 'name' => "Главная"],
            ['link' => route('backend.collection.index'), 'name' => "Коллекции"],
            ['name' => "Новое"]
        ];

        $collection = new Collection();

        return view('backend.pages.collection.edit', compact(
            'collection',
            'breadcrumbs',
        ));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCollectionRequest $request)
    {
        $validated = $request->validated();

        $collection = new Collection();

        $collection->fill($validated)->save();

        Firm::find($validated['firm_id'])->collections()->save($collection);

        return redirect()->route('backend.collection.edit', $collection->id)->with('success', 'Сохранено.');
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
    public function edit(Collection $collection, Request $request)
    {
        $breadcrumbs = [
            ['link' => route('backend.home'), 'name' => "Главная"],
            ['link' => route('backend.collection.index'), 'name' => "Коллекции"],
            ['name' => " Редактирование"]
        ];

        return view('backend.pages.collection.edit', compact(
            'collection',
            'breadcrumbs',
        ));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreCollectionRequest $request, Collection $collection)
    {
        if ($request->redirect == 'delete') {
            $collection->delete();
            return redirect()->route('backend.collection.index')->with('success', "Коллеция  {$collection->name} удалена");
        }
        $validated = $request->validated();

        $collection->fill($validated)->save();

        Firm::find($validated['firm_id'])->collections()->save($collection);

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
