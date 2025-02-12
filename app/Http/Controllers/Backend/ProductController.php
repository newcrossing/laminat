<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use App\Models\Collection;
use App\Models\Product;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();

        $breadcrumbs = [
            ['link' => route('backend.home'), 'name' => "Главная"],
            ['name' => " Продукция "]
        ];
        return view('backend.pages.product.list', compact('products', 'breadcrumbs'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $breadcrumbs = [
            ['link' => "/backend/home", 'name' => "Главная"],
            ['link' => "/backend/product", 'name' => "Продукция"],
            ['name' => "Новое"]
        ];
        //создаем объект чтобы было что отправить в форму.
        // Она же форма редактирования, надо что то отправить.
        $product = new Product();

        $attributeOptions = $product->attributeOptions->pluck('id')->toArray();

        return view('backend.pages.product.edit', compact(
            'product',
            'breadcrumbs',
            'attributeOptions',
        ));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {
        $validated = $request->validated();

        $product = new Product();

        $product->fill($validated)->save();

        Type::find($validated['type_id'])->products()->save($product);
        Collection::find($validated['collection_id'])->products()->save($product);

        $product->attributeOptions()->sync(Arr::whereNotNull($request['attributes']));

        Log::info("Добавлен товар: {$product->name}");

        return redirect()->route('backend.product.edit', $product->id)->with('success', 'Сохранено.');
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
            ['link' => "/backend/home", 'name' => "Главная"],
            ['link' => "/backend/product", 'name' => "Продукция"],
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
            return redirect()->route('backend.product.index')->with('success', "Товар  {$product->name} удален");
        }
        $validated = $request->validated();

        $product->fill($validated)->save();

        Type::find($validated['type_id'])->products()->save($product);
        Collection::find($validated['collection_id'])->products()->save($product);

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

    public function copy($id)
    {
        $product = Product::find($id);
        $product->load('attributeOptions');
        $newProduct = $product->replicate()->fill([
            'name' => 'Копия ' . $product->name,
            'slug' => $product->slug . '-copy'.random_int(1,100) ,
            'public' => false,
        ]);;
        $newProduct->save();

        $newProduct->attributeOptions()->attach($product->attributeOptions);

        return redirect()->route('backend.product.edit', $newProduct->id)->with('success', "Создан дубликат");

    }
}
