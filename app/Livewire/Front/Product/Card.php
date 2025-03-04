<?php

namespace App\Livewire\Front\Product;

use App\Models\Product;
use Livewire\Component;

class Card extends Component
{
    public $products;
    public $count = Product::COUNT_OF_PAGINATION;
    public $allCount;
    public $sorting = null;
    public $firmId = null;
    public $typeId = null;
    public $collectionId = null;
    public $selectAttributeId = [];
    public $priceFrom;
    public $priceTo;

    protected $listeners = [
        'update-sorting' => 'updateSorting',
        'update-attributes' => 'updateAttributes',
        'update-price' => 'updatePrice',
        'delete-filter' => 'deleteFilter',
        'clear-all' => 'clearAll',
    ];

    public function clearAll()
    {
        $this->firmId = null;
        $this->collectionId = null;
        $this->selectAttributeId = [];
    }

    public function updatePrice($from, $to)
    {
        $this->priceFrom = $from;
        $this->priceTo = $to;
    }

    public function deleteFilter($target)
    {
        if ($target == 'firm') {
            $this->firmId = '';
            $this->collectionId = '';
        }
        if ($target == 'collection') {
            $this->collectionId = '';
        }

    }

    public function loadMore()
    {
        $this->count = $this->count + Product::COUNT_OF_PAGINATION;
    }

    public function updateAttributes($a)
    {
        $this->count = 6;
        $this->selectAttributeId = $a;
    }

    public function updateSorting($c, $s)
    {
        $this->count = $c;
        $this->sorting = $s;
    }

    public function render()
    {
        $query = Product::query()
            ->withWhereHas('type', fn($query) => $query->where('id', '=', $this->typeId))
            ->with('collection.firm')
            ->public()
            ->when($this->priceFrom && $this->priceTo, function ($q) {
                return $q->whereBetween('price_metr', [$this->priceFrom, $this->priceTo]);
            })
            ->when($this->sorting == null || $this->sorting == 'price-min', function ($q) {
                return $q->orderBy('price_metr');
            })
            ->when($this->sorting == 'price-max', function ($q) {
                return $q->orderByDesc('price_metr');
            })
            // если указан производитель
            ->when($this->firmId, function ($q) {
                $q->whereHas('firm', fn($query) => $query->where('firms.id', '=', $this->firmId));
            })
            // если указана коллекция
            ->when($this->collectionId, function ($q) {
                $q->whereHas('collection', fn($query) => $query->where('collections.id', '=', $this->collectionId));
            })
            // если указали опцию для отбора
            ->when(count($this->selectAttributeId), function ($q) {
                foreach ($this->selectAttributeId as $key => $value) {
                    $q = $q->whereHas('attributeOptions.attribute', fn($query) => $query->where('id', $key));
                    $q = $q->whereHas('attributeOptions', fn($query) => $query->whereIn('id', $value));
                }
                return $q;
            });
        $queryCount = clone $query;

        // количество найденых товаров без лимита
        $this->allCount = $queryCount->count();

        $this->products = $query->limit($this->count)->get();

        return view('livewire.front.product.card');
    }
}
