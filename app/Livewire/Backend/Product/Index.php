<?php

namespace App\Livewire\Backend\Product;

use App\Models\Firm;
use App\Models\Product;
use App\Models\Type;
use Livewire\Component;

class Index extends Component
{
    public $count = Product::COUNT_OF_PAGINATION;
    public $allCount;
    public $sortingPrice = null;
    public $sortingPublic = null;
    public $sortingTypeId = null;
    public $sortingFirmId = null;
    public $searchText = null;

    public function tooglePublic($id){
        $product = Product::findOrFail($id);
        $public = $product->public;
        $product->public = !$public;
        $product->save();
    }


    public function loadMore()
    {
        $this->count = $this->count + Product::COUNT_OF_PAGINATION;
    }

    public function render()
    {
        $query = Product::
            when( $this->sortingPrice == 'min', function ($q) {
                return $q->orderBy('price_metr');
            })
            ->when($this->sortingPrice == 'max', function ($q) {
                return $q->orderByDesc('price_metr');
            })
            ->when(empty($this->sortingPrice) , function ($q) {
                return $q->orderByDesc('id');
            })
            ->when($this->sortingPublic == 'yes', function ($q) {
                return $q->where('public', true);
            })
            ->when($this->sortingPublic == 'no', function ($q) {
                return $q->where('public', false);
            })
            ->when($this->sortingTypeId, function ($q) {
                $q->whereHas('type', fn($query) => $query->where('types.id', '=', $this->sortingTypeId));
            })
            ->when($this->sortingFirmId, function ($q) {
                $q->whereHas('firm', fn($query) => $query->where('firms.id', '=', $this->sortingFirmId));
            })
            ->when($this->searchText, function ($q) {
                $q->where('name', 'like', "%{$this->searchText}%");
            })
            ->with(['type', 'collection'])
        ;
        $queryCount = clone $query;
        // количество найденых товаров без лимита
        $this->allCount = $queryCount->count();
        $products = $query->limit($this->count)->get();

        $firms = Firm::all();
        $types = Type::all();

        return view('livewire.backend.product.index', compact('products', 'firms',
            'types',
        ));
    }
}
