<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreFirmRequest;
use App\Models\Collection;
use App\Models\File;
use App\Models\Firm;

use App\Models\Foto;
use App\Models\Product;
use App\Models\Type;
use App\Services\FileUploadService;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class FirmController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = Firm::with('collections')->get();

        $breadcrumbs = [
            ['link' => route('backend.home'), 'name' => "Главная"],
            ['name' => " Производители "]
        ];
        return view('backend.pages.firm.list', compact('items', 'breadcrumbs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $breadcrumbs = [
            ['link' => route('backend.home'), 'name' => "Главная"],
            ['link' => route('backend.firm.index'), 'name' => "Производители"],
            ['name' => "Новое"]
        ];
        //создаем объект чтобы было что отправить в форму.
        // Она же форма редактирования, надо что то отправить.
        $firm = new Firm();

        return view('backend.pages.firm.edit', compact(
            'firm',
            'breadcrumbs',
        ));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreFirmRequest $request)
    {
        $validated = $request->validated();

        $firm = new Firm();

        $firm->fill($validated)->save();

        return redirect()->route('backend.firm.edit', $firm->id)->with('success', 'Сохранено.');
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
    public function edit(Firm $firm, Request $request)
    {
        $breadcrumbs = [
            ['link' => route('backend.home'), 'name' => "Главная"],
            ['link' => route('backend.firm.index'), 'name' => "Производители"],
            ['name' => " Редактирование"]
        ];

        return view('backend.pages.firm.edit', compact(
            'firm',
            'breadcrumbs',
        ));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreFirmRequest $request, Firm $firm, FileUploadService $fileUploadService)
    {
        if ($request->redirect == 'delete') {
            $firm->delete();
            return redirect()->route('backend.firm.index')->with('success', "Произодитель  {$firm->name} удален");
        }
        $validated = $request->validated();

        $firm->fill($validated)->save();

        $fileUploadService->uploadFile($firm, $request);

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
