<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use App\Models\Product;

use Barryvdh\Debugbar\Facades\Debugbar;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Log;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();

        $breadcrumbs = [
            ['link' => "/backend/", 'name' => "Главная"],
            ['name' => " Продукция "]
        ];
        return view('backend.pages.product.list', compact('products', 'breadcrumbs'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
    public function edit(Product $product, Request $request)
    {
        $breadcrumbs = [
            ['link' => "/admin/", 'name' => "Главная"],
            ['link' => "/admin/tag", 'name' => "Теги"],
            ['name' => " Редактирование"]
        ];
        $attributeOptions = $product->attributeOptions->pluck('id')->toArray();

        return view('backend.pages.product.edit', compact(
            'product',
            'breadcrumbs',
            'attributeOptions',
        ));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreProductRequest $request, Product $product)
    {

        if ($request->redirect == 'delete') {
            $product->delete();
            return redirect()->route('product.index')->with('success', "Товар  {$product->name} удален");
        }
        $validated = $request->validated();

        $product->fill($validated)->save();

        $product->attributeOptions()->sync(Arr::whereNotNull($request['attributes']));

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
